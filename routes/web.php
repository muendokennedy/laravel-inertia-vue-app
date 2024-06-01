<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function (Request $request) {
    return Inertia::render('Home', [
        'users' => User::when($request->search, function($query) use ($request){
            $query->where('name', 'like', '%'. $request->search . '%')
                  ->orWhere('email', 'like', '%'. $request->search . '%');
        })->paginate(5)->withQueryString(),
        'searchTerm' => $request->search,
        'can' => [
            'delete_user' => Auth::user() ? Auth::user()->can('delete', User::class) : null
        ]
    ]);
})->name('home');

Route::middleware('auth')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function(){
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
Route::middleware('guest')->group(function(){

    Route::get('/register', function(){
        return Inertia::render('Auth/Register');
    })->name('register');

    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', function(){
        return Inertia::render('Auth/Login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});


