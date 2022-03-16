<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $walidator = Validator::make($request->all(), [
            'name' => 'required|max:50|min:5',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'repeat_password' => 'required|min:6|same:password',
        ], 
        [
            'min' => 'To pole musi mieć conajmniej :min znaków.',
            'max' => 'To pole musi mieć maksymalnie :max znaków.',
            'required' => 'To pole jest wymagane.',
            'email' => 'To nie jest adres e-mail.',
            'same' => 'Hasła niezgadzają się',
        ]);

        if ($walidator->fails()) {
            return response()->json(['errors' => $walidator->errors()], 401);
        }

        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        return response()->json([
            'user' => $user,
        ]);

    }
}
