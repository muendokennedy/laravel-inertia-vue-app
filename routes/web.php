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

