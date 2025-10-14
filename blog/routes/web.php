<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/ping', fn() => 'pong');


//  http://localhost:8000/ping
