<?php

use Illuminate\Support\Facades\Route;
use App\Models\BankAccount;

Route::get('/BankAccount', function () {
    return view('bankaccount',[
        'heading'=>'testing',
        'bankAccounts'=>BankAccount::nodatabasedata()
    ]);
});

Route::get('/BankAccount/find/{id}', function ($id) {
    return view('find',[
        'heading'=>'testing',
        'bankAccounts'=>bankaccount::nodatabasedata(),
        'targetId'=>$id
    ]);
});

Route::get('/BankAccount/createaccount', function () {
    return view('createaccount');
});

Route::get('/BankAccount/login', function () {
    return view('login');
});

Route::get('/BankAccount/profile', function () {
    return view('profile');
});

Route::get('/BankAccount/deleteaccount', function () {
    return view('deleteaccount');
});

Route::get('/BankAccount/deposit', function () {
    return view('deposit');
});

Route::get('/BankAccount/withdraw', function () {
    return view('withdraw');
});

Route::get('/BankAccount/changepassword', function () {
    return view('changepassword');
});

Route::get('/BankAccount/biayaadmin', function () {
    return view('biayaadmin');
});

Route::get('/BankAccount/deposito', function () {
    return view('deposito');
});

Route::get('/BankAccount/requestkartu', function () {
    return view('requestkartu');
});

Route::post('/loggedin',function(){
    return "logged in";
});

Route::post('/created',function(){
    return "created";
});

Route::post('/changedpass',function(){
    return "changedpass";
});

Route::post('/withdrawcomplete',function(){
    return "withdrawcompleted";
});

Route::post('/depositcomplete',function(){
    return "depositcomplete";
});

Route::post('/requestcomplete',function(){
    return "requestcomplete";
});


