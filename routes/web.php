<?php

use Illuminate\Support\Facades\Route;
use App\Models\BankAccount;
use App\Http\Controllers\BankAccountController;

Route::get('/',[BankAccountController::class,'home']);

Route::get('/BankAccount', [BankAccountController::class,'BankAccount'])->middleware(['loggedIn','adminRights']);

Route::get('/BankAccount/find/{userid}',[BankAccountController::class,'find'])->middleware(['loggedIn','currentUser']);

Route::get('/BankAccount/createaccount', [BankAccountController::class,'createaccount'])->middleware('loggedOut');

Route::get('/BankAccount/login', [BankAccountController::class ,'login'])->middleware('loggedOut');

Route::get('/BankAccount/profile/{userid}', [BankAccountController::class ,'profile'])->middleware(['loggedIn','currentUser']);

Route::get('/BankAccount/deleteaccount/{userid}', [BankAccountController::class ,'deleteAccount'])->middleware(['loggedIn','currentUser']);

Route::get('/BankAccount/deposit',[BankAccountController::class ,'deposit'])->middleware('loggedIn');

Route::get('/BankAccount/withdraw',[BankAccountController::class,'withdraw'])->middleware('loggedIn');

Route::get('/BankAccount/changepassword', [BankAccountController::class ,'changePassword'])->middleware('loggedIn');

Route::get('/BankAccount/biayaadmin',[BankAccountController::class ,'biayaAdmin'])->middleware('loggedIn');

Route::get('/BankAccount/deposito', [BankAccountController::class ,'deposito'])->middleware('loggedIn');

Route::get('/BankAccount/requestkartu', [BankAccountController::class ,'requestKartu'])->middleware('loggedIn');

Route::get('/BankAccount/blockcreditcard', [BankAccountController::class ,'blockCreditCard'])->middleware(['loggedIn','adminRights']);

Route::post('/loggedin',[BankAccountController::class ,'loggedIn'])->middleware('throttle:login');

Route::post('/createdaccount',[BankAccountController::class ,'createdAccount']);

Route::post('/changedpass',[BankAccountController::class,'changedPass']);

Route::post('/withdrawcomplete',[BankAccountController::class ,'withdrawComplete']);

Route::post('/depositcomplete',[BankAccountController::class ,'depositComplete']);

Route::post('/requestcomplete',[BankAccountController::class ,'requestComplete']);

Route::post('/logout',[BankAccountController::class,'logout']);

Route::post('/depositocompleted',[BankAccountController::class,'depositocompleted']);

Route::post('/blockcompleted',[BankAccountController::class ,'blockCompleted']);

Route::get('/BankAccount/changeprofile', [BankAccountController::class ,'changeProfile']);

Route::post('/changedprofile',[BankAccountController::class,'changedProfile']);