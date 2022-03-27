<?php

namespace App\Http\Controllers\StoreHouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreHouse;
use App\Models\PigeonHawk;


class StoreHouseController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:api']);
    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

    public function getStoreHouse()
    {
        return StoreHouse::with('product')->get();
    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

    public function getStoreHouseByCategory(Request $request)
    {
        
        $category = $request->category;
        if( $category )
        {
            $storehouseProductsByCategory = StoreHouse::whereHas('product', fn($query) => $query->whereIn('category' ,$category))->with('product')->get();

            if( !empty($storehouseProductsByCategory) )
            {
                return response()->json($storehouseProductsByCategory);
            }
        }
        
        return false;
    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

    public function productAction(Request $request)
    {
        $storehouseProductId = $request->storehouse_product_id;
        $pigeonHawkId = $request->pigeon_hawk_id;

        $queryStorehouse = Storehouse::where('id', $storehouseProductId )->with('product')->first();
        $pigeonHawk = PigeonHawk::find($pigeonHawkId);

        if( $queryStorehouse )
        {
            switch ($queryStorehouse->product->category) {
                case 'waterbucket':
                    
                    if( $queryStorehouse->quantity-1 >= 1 )
                    {
                        $pigeonHawk->max_level_water += $queryStorehouse->product->value;
                        $pigeonHawk->save();
                        
                        $queryStorehouse->quantity -= 1;
                        $queryStorehouse->save();
                    }
                    else{
                        $pigeonHawk->max_level_water += $queryStorehouse->product->value;
                        $pigeonHawk->save();
                        
                        $queryStorehouse->delete();
                    }
                    
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        


    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

}
