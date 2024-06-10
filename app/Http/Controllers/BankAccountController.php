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

    public function createdAccount(Request $request){
        $temp=$request->validate([
            'id'=>'required',
            'password'=>'required'
        ]);
        if(BankAccountController::findById($temp['id'])!=null){
            return("error id taken");
        }
        return $temp;
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

    private function findById($targetId){
        $bankAccounts=BankAccount::nodatabasedata();
        foreach($bankAccounts as $bankAccount){
            if ($targetId==$bankAccount['id']){
                return $bankAccount;
            }
        }
        return null;
    }
}
