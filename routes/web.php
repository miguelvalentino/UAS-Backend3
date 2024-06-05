<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/createaccount', function () {
    return view('createaccount');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/deleteaccount', function () {
    return view('deleteaccount');
});

Route::get('/deposit', function () {
    return view('deposit');
});

Route::get('/withdraw', function () {
    return view('withdraw');
});

Route::get('/changepassword', function () {
    return view('changepassword');
});

Route::get('/biayaadmin', function () {
    return view('biayaadmin');
});

Route::get('/deposito', function () {
    return view('deposito');
});

Route::get('requestkartu', function () {
    return view('requestkartu');
});