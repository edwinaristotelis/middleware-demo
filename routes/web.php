<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Flash Sale page protected by Business Hours middleware.
Route::middleware(['business.hours'])->get('/flash-sale', function () {
    return '<h1>Flash Sale!</h1><p>Welcome! The Flash Sale is currently available.</p>';
});