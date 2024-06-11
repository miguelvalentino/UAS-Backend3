<?php

use Illuminate\Support\Facades\Route;
use App\Models\BankAccount;
use App\Http\Controllers\BankAccountController;

Route::get('/',[BankAccountController::class,'home']);

Route::get('/BankAccount', [BankAccountController::class,'BankAccount']);

Route::get('/BankAccount/find/{id}',[BankAccountController::class,'find']);

Route::get('/BankAccount/createaccount', [BankAccountController::class,'createaccount']);

Route::get('/BankAccount/login', [BankAccountController::class ,'login']);

Route::get('/BankAccount/profile/{id}', [BankAccountController::class ,'profile']);

Route::get('/BankAccount/deleteaccount/{id}', [BankAccountController::class ,'deleteAccount']);

Route::get('/BankAccount/deposit',[BankAccountController::class ,'deposit']);

Route::get('/BankAccount/withdraw',[BankAccountController::class,'withdraw']);

Route::get('/BankAccount/changepassword', [BankAccountController::class ,'changePassword']);

Route::get('/BankAccount/biayaadmin',[BankAccountController::class ,'biayaAdmin']);

Route::get('/BankAccount/deposito', [BankAccountController::class ,'deposito']);

Route::get('/BankAccount/requestkartu', [BankAccountController::class ,'requestKartu']);

Route::post('/loggedin',[BankAccountController::class ,'loggedIn']);

Route::post('/createdaccount',[BankAccountController::class ,'createdAccount']);


Route::post('/changedpass',[BankAccountController::class,'changedPass']);

Route::post('/withdrawcomplete',[BankAccountController::class ,'withdrawComplete']);

Route::post('/depositcomplete',[BankAccountController::class ,'depositComplete']);

Route::post('/requestcomplete',function(){
    return "requestcomplete";
});


