<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/register', function(){
    return Inertia::render('Auth/Register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function(){
    return Inertia::render('Auth/Login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
