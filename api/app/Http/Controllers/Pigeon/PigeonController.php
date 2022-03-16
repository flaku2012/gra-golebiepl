<?php

namespace App\Http\Controllers\Pigeon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pigeon;

class PigeonController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:api']);
    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

    // pobieranie - wszystkie gołębie użytkownika wg. gołębnika
    public function getUserPigeons($pigeon_hawk_id)
    {
         
        $pigeons = Pigeon::where('pigeon_hawk_id', $pigeon_hawk_id)->get();
    
        abort_if(!$pigeons, 404, "Not found");

        return response()->json($pigeons);

    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

    // pobieranie - jeden gołąb wg. ID gołębia
    public function getUserPigeon($pigeon_id)
    {

        $pigeon = Pigeon::where( 'id', $pigeon_id )->first();
        abort_if(!$pigeon, 404, "Not found");

        return response()->json($pigeon);

    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

    // pobieranie - rodziców danego gołebia po ID
    public function getPigeonParents($pigeon_id)
    {

        $pigeon = Pigeon::where( 'id', $pigeon_id )->with('parent_mother')->with('parent_father')->first();
        abort_if(!$pigeon, 404, "Not found");

        return response()->json($pigeon);

    }

    // pobieranie - pobieranie partnera danego gołębia po ID
    public function getPigeonPartner($pigeon_id)
    {

        $pigeon = Pigeon::where( 'id', $pigeon_id )->with('partner')->first();
        abort_if(!$pigeon, 404, "Not found");

        return response()->json($pigeon->partner);

    }

//====================================================================================================
//====================================================================================================
//====================================================================================================

}
