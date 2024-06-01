<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        // Store the image of file into disk
        $userData = $request->validate([
            'avatar' => 'file | nullable | max:300',
            'name' => 'required | max:255',
            'email' => 'required | email | unique:users',
            'password' => 'required | confirmed'
        ]);

        if($request->hasFile('avatar')){
            $userData['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }

        $user = User::create($userData);

        Auth::login($user);

        return redirect()->route('dashboard')->with('greet', 'Welcome to inertia vue app');

    }

    public function login(Request $request)
    {
       $loginCredentials = $request->validate([
        'email' => 'required | email | max:255',
        'password' => 'required'
       ]);

       if(Auth::attempt($loginCredentials, $request->remember)){

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'))->with('greet', 'You have logged in successfully');

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
