<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\ChatEvent;
use App\Events\MessageSent;

use App\Models\User\User;
use App\Models\User\Message;


class MessagesController extends Controller
{
    // spr czy zalogowany
    public function __construct(){
        $this->middleware(['auth:api']);
    }


    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->message
        ]);

        broadcast(new MessageSent($message->loadMissing('user')))->toOthers();
        // ->toOthers();
                
        return ['status' => 'success'];
    }

    // funkcja do testowania - do testowania
    public function weryfikacja()
    {
        
        return 'test';
    }
    
}
