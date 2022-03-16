<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Storehouse;
use App\Models\User;

class ShopController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:api']);
    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

    public function getProducts()
    {
        $products = Product::get();

        if( !empty($products) )
        {
            return response()->json($products);
        }

        return false;
        
    }

//====================================================================================================
//====================================================================================================
//====================================================================================================
    
    public function getProductsByCategory($category)
    {
        $products = Product::where('category', $category)->get();

        if( !empty($products) )
        {
            return response()->json($products);
        }

        return false;
        
    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

    public function getProduct($product_id)
    {
        $product = Product::where('id', $product_id)->first();

        if( !empty($product) )
        {
            return response()->json($product);
        }

        return false;

    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

public function buyProduct(Request $request)
{
    $user = Auth()->user();
    $userId = Auth()->id();

    $requestProductId = $request->product_id;
    $requestCount = $request->count;

    $product = Product::find($requestProductId);
    $total_receipt = $product->price * $requestCount;
    $total_quantity = $product->value * $requestCount;
         
    if( $user->money < $total_receipt )
    {
        return response()->json(['errorValue' => 'Za mało gotówki', 'errorProductId' => $product->id], 401);
    }
    
    $updateStorehouse = Storehouse::where('product_id', $requestProductId)->first();

    if( $updateStorehouse == null )
    {
        $data['user_id'] = Auth()->id();
        $data['product_id'] = $requestProductId;
        $data['quantity'] = $total_quantity;
        Storehouse::create($data);
    }
    else{
        $updateStorehouse->quantity += $total_quantity;
        $updateStorehouse->save();
    }
    

    $updateUser = User::find($userId);
    $updateUser->money -= $total_receipt;
    $updateUser->save();

}

//====================================================================================================
//====================================================================================================
//====================================================================================================

}
