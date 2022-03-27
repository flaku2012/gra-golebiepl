<?php

namespace App\Http\Controllers\PigeonHawks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\PigeonHawk;
use App\Models\Storehouse;
use App\Models\Product;

class PigeonHawksController extends Controller
{
    
    public function __construct(){
        $this->middleware(['auth:api']);
    }

//====================================================================================================
//====================================================================================================

    public function getUserPigeonHawks()
    {

        $pigeonhawks = PigeonHawk::get();

        abort_if(!$pigeonhawks, 404, "Not found");

        return response()->json($pigeonhawks);

    }

//====================================================================================================
//====================================================================================================
    
    public function getUserPigeonHawk($pigeonhawk)
    {
        $hawk = PigeonHawk::find($pigeonhawk);

        // jak masz global scope to nie musisz go callować, sam się dodaje
        // jak byś chiał bez globalnych scope to robisz cos w tym stylu
        // PigeonHawk::withoutGlobalScope(['owns'])->where('user_id', 1337)->first()

        abort_if(!$hawk, 404, "Not found");

        return response()->json($hawk);

    }

//====================================================================================================
//====================================================================================================

    public function cleanHawk(Request $request)
    {
        $pigeonhawk = PigeonHawk::find($request->id);

        //wartość o ile ma się zwiększyć poziom czyszczenia gołębnika
        $value_plus_clean = 5;
    

        if( $pigeonhawk->max_level_clean >= $pigeonhawk->level_clean+$value_plus_clean )
        {
            $pigeonhawk->level_clean += $value_plus_clean;
            $pigeonhawk->save();
            return ['status', 'success'];
        }
        return false;

    }

//====================================================================================================
//====================================================================================================

    public function addLevelWaterToHawkHawk(Request $request)
    {
        $pigeonhawk = PigeonHawk::find($request->id);

        //wartość o ile ma się zwiększyć poziom wody w poidłach w litrach
        $value_plus_water = 1;


        if( $pigeonhawk->max_level_water >= $pigeonhawk->level_water+$value_plus_water )
        {
            $pigeonhawk->level_water += $value_plus_water;
            $pigeonhawk->save();
            return ['status', 'success'];
        }
        return false;

    }

//====================================================================================================
//====================================================================================================

    public function addFoodToHawk(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'storehouse_id' => 'required',
            'count' => 'required|numeric',
            'pigeonhawk_id' => 'required'
        ],
        [
            'required' => 'To pole jest wymagane!',
            'numeric' => 'To pole musi być liczbą!'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $storehouseId = (int)$request->storehouse_id;
        $count = (int)$request->count;
        $pigeonHawkId = (int)$request->pigeonhawk_id;

        $queryStorehouse = Storehouse::where('id', $storehouseId)->with('product')->first();
        $queryPigeonHawk = PigeonHawk::where('id', $pigeonHawkId)->first();


        if( $queryStorehouse && $queryStorehouse->product->category === 'food' && $queryPigeonHawk )
        {
            //sprawdzenie czy jest tyle karmy na magazynie
            if( $count > $queryStorehouse->quantity*$queryStorehouse->product->value )
            {
                return response()->json(['errors' => ['otherError' => 'Nie ma tyle karmy ma magazynie!']], 401);
            }

            //sprawdzenie czy jest tyle miejsca w gołębniku
            if( $count > $queryPigeonHawk->max_level_food-$queryPigeonHawk->level_food )
            {
                return response()->json(['errors' => ['otherError' => 'Nie ma tyle miejsca w gołębniku!']], 401);
            }

            // aktualizacja stanów magazynowych
            if( $queryStorehouse->quantity-$count > 0 )
            {
                $queryStorehouse->quantity -= $count;
                $queryStorehouse->save();
            }
            else
            {
                $queryStorehouse->delete();
            }
            
            // aktualizacja ilość karmy w gołębniku wg. typu karmy
            $productId = $queryStorehouse->product->id;
            $quantityFromDatabase = $queryPigeonHawk->getFoodType($productId);
            $updateQuantity = $quantityFromDatabase + $count;
            $queryPigeonHawk->updateFoodType(['product_' . $productId => $updateQuantity]);

            //aktualizacja ilości karmy wg. wagi
            $queryPigeonHawk->level_food += $count;
            $queryPigeonHawk->save();

            return false;
            
        }         

    }

//====================================================================================================
//====================================================================================================

    public function upgradeHawk(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'storehouse_id' => 'required',
            'pigeonhawk_id' => 'required'
        ],
        [
            'required' => 'To pole jest wymagane!'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $storehouseId = (int)$request->storehouse_id;
        $pigeonHawkId = (int)$request->pigeonhawk_id;

        $queryStorehouse = Storehouse::where('id', $storehouseId)->with('product')->first();
        $queryPigeonHawk = PigeonHawk::where('id', $pigeonHawkId)->first();

        if( $queryStorehouse && $queryPigeonHawk && ($queryStorehouse->product->category === 'waterbucket' || $queryStorehouse->product->category === 'construction') )
        {
            
            //sprawdzenie czy jest tyle produktu na magazynie
            if( $queryStorehouse->quantity < 1 )
            {
                return response()->json(['errors' => ['otherError' => 'Nie masz tego na magazynie!']], 401);
            }
          
            //ulepszenie gołębnika
            switch( $queryStorehouse->product->category ){
                case 'waterbucket':
                    $queryPigeonHawk->max_level_water += $queryStorehouse->product->value;
                    $queryPigeonHawk->save();

                    break;
                case 'construction':
                    $queryPigeonHawk->max_quantity_pigeons += $queryStorehouse->product->value;
                    $queryPigeonHawk->save();
                    
                    break;
            }

            //aktualizacja stanu magayznowego
            if( $queryStorehouse->quantity-1 > 0 )
            {
                $queryStorehouse->quantity -= 1;
                $queryStorehouse->save();
            }
            else
            {
                $queryStorehouse->delete();
            }

            return false;

        }


    }

//====================================================================================================
//====================================================================================================

    public function addGrit(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pigeonhawk_id' => 'required'
        ],
        [
            'required' => 'To pole jest wymagane!'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $pigeonHawkId = (int)$request->pigeonhawk_id;

        $queryPigeonHawk = PigeonHawk::where('id', $pigeonHawkId)->first();
        
        $queryStorehouse = StoreHouse::whereHas('product', fn($query) => $query->whereIn('category' ,['grit']))->with('product')->get();

        //sprawdzenie czy jest gryt na magazynie
        if( $queryStorehouse )
        {
            $quantityToMax = $queryPigeonHawk->max_level_grit - $queryPigeonHawk->level_grit;
            
            foreach( $queryStorehouse as $storeHouse )
            {
                
                if( $quantityToMax >= $storeHouse->quantity )
                {
                    $quantityToMax -= $storeHouse->quantity;
                    $levelGritToDatabase = $queryPigeonHawk->max_level_grit - $quantityToMax;
                    $queryPigeonHawk->level_grit = $levelGritToDatabase;
                    $queryPigeonHawk->save();

                    $storeHouse->delete();
                
                }else{
                    
                    $queryPigeonHawk->level_grit += $quantityToMax;
                    $queryPigeonHawk->save();
                    
                    $storeHouse->quantity -= $quantityToMax;
                    $storeHouse->save();
                    
                }
                
            }

        }

        return false;
        
    }

//====================================================================================================
//====================================================================================================

    public function test()
    {
    
        //return Pigeonhawk::first()->getFoodType(1);
        //return Pigeonhawk::first()->updateFoodType(['product_' . 1 => 10]);
        

    }

//====================================================================================================
//====================================================================================================
    
}
