<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankAccount;

class BankAccountController extends Controller
{
    public function login(){
        return view('login');
    }

    public function BankAccount(){
        return view('bankaccount',[
            'heading'=>'testing',
            'bankAccounts'=>BankAccount::nodatabasedata()
        ]);
    }

    public function find($id){
        return view('find',[
            'heading'=>'testing',
            'bankAccounts'=>bankaccount::nodatabasedata(),
            'targetId'=>$id
        ]);
    }

    public function createAccount(){
        return view('createaccount');
    }

    public function profile(){
        return view('profile');
    }

    public function deleteAccount(){
        return view('deleteaccount');
    }

    public function deposit(){
        return view('deposit');
    }

    public function withdraw(){
        return view('withdraw');
    }
    
    public function changePassword(){
        return view('changepassword');
    }

    public function biayaAdmin(){
        return view('biayaadmin');
    }

    public function deposito(){
        return view('deposito');
    }
    
    public function requestKartu(){
        return view ('requestkartu');
    }
}
