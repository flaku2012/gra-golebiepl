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
        $request = request()->user()->friends;
 
        if( $request )
        {
   
            return response()->json($request);
         
        }
        
        return false;

    }

    
    public function addFriend(User $user, Request $request)
    {
       
    }

    public function searchFriends(Request $request)
    {
        $searchPharse = $request->q;

        $validator = Validator::make($request->all(), [
            'q' => 'required|max:50|min:3',
        ], 
        [
            'min' => 'To pole musi mieć conajmniej :min znaków.',
            'max' => 'To pole musi mieć maksymalnie :max znaków.',
            'required' => 'To pole jest wymagane.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        // zobacz metodę getFriends - pobiera wszystkich friendsów tych których ja zaprosiłem i tych którzy mnie - zaakceptowane znajomości

        // w metodzie searchFriends - musi znaleść wszystkich użytkowników o nazwie takiej jaką wpiszę i ich zwrócić
        // bo chcę w template wyszstkiić wszystkich i dać przyciski: zaakceptuj zaproszenie, usuń ze znajmowcyh, dodaj znajomego
        // moge ci pokazać co zwraca w postmanie

        $query = User::where('name', 'LIKE', "%{$searchPharse}%")
            ->where('id', '!=', Auth()->id())
            ->with('friends')
            ->get();
     

    
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
            ['status', Friend::PENDING],
        ])->exists();
    }


    //====================================================================================================
    //==================================================================================================== 

}
