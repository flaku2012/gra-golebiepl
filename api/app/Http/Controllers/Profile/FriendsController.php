<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Friend;
use App\Models\User;

class FriendsController extends Controller
{

    public function __construct(){
        $this->middleware(['auth:api']);
    }
    
    //====================================================================================================
    //==================================================================================================== 

    public function getFriends()
    {
        $userId = Auth()->id();
        
        $request = User::where('id', $userId)->first()->friends;
 
        if( $request )
        {
   
            return response()->json($request);
         
        }
        
        return false;

    }

    public function searchFriends(Request $request)
    {
        $searchPharse = $request->q;

        $walidator = Validator::make($request->all(), [
            'q' => 'required|max:50|min:3',
        ], 
        [
            'min' => 'To pole musi mieć conajmniej :min znaków.',
            'max' => 'To pole musi mieć maksymalnie :max znaków.',
            'required' => 'To pole jest wymagane.',
        ]);

        if ($walidator->fails()) {
            return response()->json(['errors' => $walidator->errors()], 401);
        }

        $query = User::where( [['name', 'LIKE', "%{$searchPharse}%"], ['id', '!=', Auth()->id()]])->with('friends')->get();
        //$query = User::first()->friends;
        return response()->json($query);
    }

    // test function
    public function friendship(Request $request)
    {
        $friendId = $request->friend_id;
        $queryFriend = Friend::where([
            [ 'friend_id', $friendId ],
            ['user_id', Auth()->id()]
        ])->orWhere([
            ['user_id', $friendId],
            ['friend_id', Auth()->id()],
        ])->first();
        
        $friendShip = new \stdClass;

        if( !is_null($queryFriend) ){
            $friendShip->exists = true;
            $friendShip->accepted = $queryFriend->accepted;
        }else{
            $friendShip->exists = false;
            $friendShip->accepted = false;
        }

        return $friendShip;

    }

    public function hasFriendInvitation(Request $request)
    {
        $friendId = $request->friend_id;
        return Friend::where([
            ['user_id', $friendId],
            ['friend_id', Auth()->id()],
            ['accepted', 0],
        ])->exists();
    }


    //====================================================================================================
    //==================================================================================================== 

}
