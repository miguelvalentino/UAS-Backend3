<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\Models\BankAccount;
use App\Models\User;

class BankAccountController extends Controller
{
    public function home(){
        return view('home');
    }
    
    public function login(){
        return view('login');
    }

    public function BankAccount(){
        return view('bankaccount',[
            'heading'=>'testing',
            'users'=>User::all(),
            'bankAccounts'=>BankAccount::all()
        ]);
    }

    public function createAccount(){
        return view('createaccount');
    }

    public function profile($id){
        $temp=User::find($id);
        if($temp!=null){
            return $temp;
        }else{
            return("no user found");
        }
    }

    public function deleteAccount($id){
        $temp=User::find($id);
        if ($temp!=null){
            $temp->delete();
            return ("succesfully deleted");
        }else{
            return("no user found");
        }
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

    public function changedPass(Request $request){
        $temp=$request->validate([
            'oldPassword'=>'required',
            'newPassword'=>'required'
        ]);
        $acc=User::find(auth()->user()->id);
        if(Hash::check($temp['oldPassword'],$acc['password'])){
            $acc->update(['password'=>(bcrypt($temp['newPassword']))]);
            return "password changed succsefully";
        }else{
            return "wrong password";
        }
    }

    public function depositComplete(Request $request){
        $temp=$request->validate([
            'depositAmount'=>'required'
        ]);
        $bank=BankAccount::where('user_id',auth()->user()->id)->firstOrFail();

        $bank->update(['balance'=>($bank['balance']+$temp['depositAmount'])]);
        return "successfully deposited";
    }

    public function withdrawComplete(Request $request){
        $temp=$request->validate([
            'withdrawAmount'=>'required'
        ]);
        $bank=BankAccount::where('user_id',auth()->user()->id)->firstOrFail();
        if($bank['balance']<$temp['withdrawAmount']){
            return "error: insufficient funds try withdrawing less";
        }
        $bank->update(['balance'=>($bank['balance']-$temp['withdrawAmount'])]);
        return "withdrawal successfull";
    }

    public function loggedIn(Request $request){
        $temp=$request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(auth()->attempt([
        'email'=>$temp['email'],
        'password'=>$temp['password']
        ])){
            return "succesffuly logged in";
        }else{
            return "invalid credentials";
        }
    }

    public function createdAccount(Request $request){
        $temp=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $temp['password']=bcrypt($temp['password']);
        $curr=User::create([
            'name'=>$temp['name'],
            'email'=>$temp['email'],
            'password'=>$temp['password']
        ]);
        BankAccount::create([
            'balance'=>0,
            'user_id'=>$curr['id']
        ]);
        auth()->login($curr);
        return $curr;
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return "successfully logged out";
    }
}
