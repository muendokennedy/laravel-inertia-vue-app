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

    public function login(Request $request)
    {
       $loginCredentials = $request->validate([
        'email' => 'required | email | max:255',
        'password' => 'required'
       ]);

       if(Auth::attempt($loginCredentials, $request->remember)){

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));

       }

       return back()->withErrors([
        'email' => 'The provided credentials do not match our records'
       ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
       Auth::logout();

       $request->session()->invalidate();

       $request->session()->regenerateToken();

       return redirect()->route('home');
    }
}
