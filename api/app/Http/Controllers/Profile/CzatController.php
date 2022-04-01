<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\ChatEvent;
use App\Events\MessageSent;

use App\Models\User\User;
use App\Models\User\Czat;

class CzatController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:api']);
    }


    public function fetchMessages()
    {
        return Czat::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $message = auth()->user()->czats()->create([
            'message' => $request->message
        ]);

        broadcast(new MessageSent($message->loadMissing('user')))->toOthers();
                
        return ['status' => 'success'];
    }

    // funkcja do testowania - do testowania
    public function weryfikacja()
    {
        
        return 'test';
    }
}
