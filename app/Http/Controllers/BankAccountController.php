<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\Models\BankAccount;
use App\Models\User;

use Carbon\Carbon;
use Faker\Factory as Faker;

class BankAccountController extends Controller
{
    public function home(){
        return view('home');
    }
    
    public function login(){
        return view('login');
    }

    public function BankAccount(Request $request){
        $temp=User::join('bank_accounts','users.id','=','bank_accounts.user_id');
        if(request('search')??false){
            $search=explode(':',request('search'),2);
            $temp->where($search[0],'like','%'.$search[1].'%');
        }
        if(request('sort')??false){
            $sort=explode(':',request('sort'),2);
            $temp->orderBy($sort[0],$sort[1]);
        }
        $temp->select(
            'users.id as user_id',
            'users.name',
            'users.email',
            'users.password',
            'users.admin',
            'bank_accounts.id as bank_account_id',
            'bank_accounts.deposito_balance',
            'bank_accounts.balance',
            'bank_accounts.credit_card_number as credit',
            'bank_accounts.credit_card_blocked as blocked',
        );
                
        if(request('pageSize')??false &&request('page')??false){
            $temp=$temp->paginate(request('pageSize'));
            $hasNext=$temp->hasMorePages();
            $hasPrev=$temp->onFirstPage();
            $lastPage=$temp->lastPage();
            $isPaginating=true;
        }else{
            $temp=$temp->get();
            $isPaginating=false;
            $lastPage=0;
            $hasPrev=0;
            $hasNext=0;
            $isPaginating=0;
        }
        return view('bankaccount',[
            'heading' => 'testing',
            'table' => $temp,
            'page_size'=>request('pageSize'),
            'currPage'=>request('page'),
            'lastPage'=>$lastPage,
            'hasPrev'=>$hasPrev,
            'hasNext'=>$hasNext,
            'isPaginating'=>$isPaginating
        ]);
    }

    public function createAccount(){
        return view('createaccount');
    }

    public function profile($id){
        $temp=User::find($id);
        $bank=BankAccount::where('user_id',$id)->firstOrFail();

        if($temp!=null){
            return view('profile',[
                'BankAccount'=>$temp,
                'Bank'=>$bank
            ]);
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
            return redirect('/');
        }else{
            return "wrong password";
        }
    }

    public function depositComplete(Request $request){
        $temp=$request->validate([
            'depositAmount'=>'required'
        ]);
        $bank=BankAccount::where('user_id',auth()->user()->id)->firstOrFail();
        if($bank['credit_card_blocked']){
            return "your credit card is blocked please requesst a new one";
        }
        $bank->update(['balance'=>($bank['balance']+$temp['depositAmount'])]);
        return redirect('/');
    }

    public function withdrawComplete(Request $request){
        $temp=$request->validate([
            'withdrawAmount'=>'required'
        ]);
        $bank=BankAccount::where('user_id',auth()->user()->id)->firstOrFail();
        if($bank['credit_card_blocked']){
            return "your credit card is blocked please requesst a new one";
        }
        if($bank['balance']<$temp['withdrawAmount']){
            return "error: insufficient funds try withdrawing less";
        }
        $bank->update(['balance'=>($bank['balance']-$temp['withdrawAmount'])]);
        return redirect('/');
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
            return redirect('/');
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
        return redirect('/');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function depositocompleted(Request $request){
        $temp=$request->validate([
            "depositoAmount"=>'required',
        ]);
        if($temp['depositoAmount']<10000000){
            return "at least 10 000 000 is required";
        }
        $bank=BankAccount::where('user_id',auth()->user()->id)->firstOrFail();
        if($bank['credit_card_blocked']){
            return "your credit card is blocked please requesst a new one";
        }
        if($temp['depositoAmount']>$bank['balance']){
            return "insufficient funds";
        }
        $bank->update(['deposito_balance'=>($bank['deposito_balance']+$temp['depositoAmount'])]);
        $bank->update(['balance'=>($bank['balance']-$temp['depositoAmount'])]);
        $bank->update(['deposito_last_updated'=>Carbon::now()]);
        return "successfully deposited to deposito balance";
    }

    public function requestComplete(){
        $faker=Faker::create();
        $bank=BankAccount::where('user_id',auth()->user()->id)->firstOrFail();
        if($bank['credit_card_number']==null||$bank['credit_card_blocked']==true){
            $temp=$faker->unique()->creditCardNumber('Visa',true);
            $bank->update(['credit_card_number'=>$temp]);
            $bank->update(['credit_card_blocked'=>false]);
            return "your credit card number is ".$temp;
        }else{
            return "you are not eligible to request a credit card";
        }
    }

    public function blockCreditCard(){
        return view("blockcreditcard");
    }

    public function blockCompleted(Request $request){
        $temp=$request->validate([
            "target"=>'required',
        ]);
        $bank=BankAccount::where('credit_card_number',$temp['target'])->firstOrFail();
        $bank->update(['credit_card_blocked'=>true]);
        return "successfully blocked ".$temp['target'];
    }

    public function transfer(){
        return view("transfer");
    }
    

    public function transferCompleted(Request $request){
        $temp=$request->validate([
            'receiver'=>'required',
            'amount'=>'required',
            'password'=>'required'
        ]);
        $curr=auth()->user()->id;
        $bank=BankAccount::where('user_id',$curr)->firstOrFail();

        $receiver=BankAccount::where('credit_card_number',$temp['receiver'])->firstOrFail();

        if(!Hash::check($temp['password'],auth()->user()->password)){
            return "incorrect password";
        }

        if($bank['balance']<$temp['amount']){
            return "insufficient funds";
        }

        $bank->update(['balance'=>$bank['balance']-$temp['amount']]);
        $bank->update(['credit_card_blocked'=>true]);
        $receiver->update(['balance'=>$receiver['balance']+$temp['amount']]);
        return "successfully transferred balance";
    }
}