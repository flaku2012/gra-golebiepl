<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Marketplace;

class MarketplaceController extends Controller
{
    
    public function __construct(){
        $this->middleware(['auth:api']);
    }

//====================================================================================================
//====================================================================================================
    
    public function getMarketplace()
    {
        $marketplace = Marketplace::with('pigeon')->get();

        return response()->json($marketplace);
    }

//====================================================================================================
//====================================================================================================

    public function getDetailsAuction(Request $request)
    {
        $auction_id = (int)$request->auction_id;

        abort_if(!$auction_id, 404, 'Auction not found');

        $queryMarketplace = Marketplace::where('id', $auction_id)->with('pigeon')->first();
        //$queryMarketplace = Marketplace::find($auction_id);

        if( !empty($queryMarketplace) )
        {
            return response()->json($queryMarketplace);
        }

        return false;
        
    }

//====================================================================================================
//====================================================================================================    
   
}
