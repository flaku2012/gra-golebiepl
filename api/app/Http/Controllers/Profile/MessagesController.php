<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use App\Models\User\User;
use App\Models\User\Message;


class MessagesController extends Controller
{

    public function __construct(){
        $this->middleware(['auth:api']);
    }


    public function getMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'user_id' => Auth()->id(),
            'receiver_id' => $request->receiver_id,
            'thema' => $request->thema,
            'message' => $request->message
        ]);
  
        return ['status' => 'success'];
    }

    public function destroy(Request $request)
    {
        $message = $request->id;
        
        foreach( $message as $msg )
        {
            $qry = Message::withoutGlobalScopes()->find($msg);
            $qry->delete(); 
        }
        return ['status' => 'success'];
        
    }


    
}
