<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/about', function(){
    return Inertia::render('About', ['user' => 'Kennedy']);
})->name('about');
