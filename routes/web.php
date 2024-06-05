<?php

use Illuminate\Support\Facades\Route;
use App\Models\BankAccount;
use App\Http\Controllers\BankAccountController;

Route::get('/BankAccount', [BankAccountController::class,'BankAccount']);

Route::get('/BankAccount/find/{id}',[BankAccountController::class,'find']);

Route::get('/BankAccount/createaccout', [BankAccountController::class,'createaccount']);

Route::get('/BankAccount/login', [BankAccountController::class ,'login']);

Route::get('/BankAccount/profile', [BankAccountController::class ,'profile']);

Route::get('/BankAccount/deleteaccount', [BankAccountController::class ,'deleteAccount']);

Route::get('/BankAccount/deposit',[BankAccountController::class ,'deposit']);

Route::get('/BankAccount/withdraw',[BankAccountController::class ,'withdraw']);

Route::get('/BankAccount/changepassword', [BankAccountController::class ,'changePassword']);

Route::get('/BankAccount/biayaadmin',[BankAccountController::class ,'biayaAdmin']);

Route::get('/BankAccount/deposito', [BankAccountController::class ,'deposito']);

Route::get('/BankAccount/requestkartu', [BankAccountController::class ,'requestKartu']);

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


