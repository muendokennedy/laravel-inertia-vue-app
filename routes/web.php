<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    sleep(5);
    return Inertia::render('Home');
});

Route::get('/about', function(){
    return Inertia::render('About', ['user' => 'Kennedy']);
});
