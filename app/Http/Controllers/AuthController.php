<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {

        $userData = $request->validate([
            'name' => 'required | max:255',
            'email' => 'required | email | unique:users',
            'password' => 'required | confirmed'
        ]);

        $user = User::create($userData);

        Auth::login($user);

        return redirect()->route('home');

    }
}
