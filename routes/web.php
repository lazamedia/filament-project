<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return redirect('/dashboard/login');
});

Route::get('/panel', function () {
    return redirect('/dashboard');
});
