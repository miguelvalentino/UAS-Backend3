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
        $bank=BankAccount::where('user_id',$id)->first();
        if($temp!=null){
            return view('profile',[
                'BankAccount'=>$temp,
                'Bank'=>$bank
            ]);
        }else{
            abort(403,"no user found");
        }
    }

    public function deleteAccount(){
        return view('deleteaccount');
    
    }

    public function deletedAccount($id){
        $temp=User::find($id);
        if ($temp!=null){
            $temp->delete();
            return ("succesfully deleted");
        }else{
            abort(403,"no user found");
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

    public function changeProfile(){
        return view('changeprofile');
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
            'newPassword'=>'required|min:6'
        ]);
        $acc=User::find(auth()->user()->id);
        if($acc==null){
            abort(403,"invalid id");
        }
        if(Hash::check($temp['oldPassword'],$acc['password'])){
            $acc->update(['password'=>(bcrypt($temp['newPassword']))]);
            return redirect('/');
        }else{
            abort(403,"wrong password");
        }
    }

    public function depositComplete(Request $request){
        $temp=$request->validate([
            'depositAmount'=>'required|numeric|min:1'
        ]);
        $bank=BankAccount::where('user_id',auth()->user()->id)->first();
        if($bank==null){
            abort(403,"no user found");
        }
        if($bank['credit_card_blocked']){
            abort(403,"your credit card is blocked please requesst a new one");
        }
        $curr=Carbon::now();
        $bank->update([
        'balance'=>($bank['balance']+$temp['depositAmount']),
        'interest_date'=>$curr,
        'tax_date'=>$curr
        ]);
        return redirect('/');
    }

    public function withdrawComplete(Request $request){
        $temp=$request->validate([
            'withdrawAmount'=>'required|numeric|min:1'
        ]);
        $bank=BankAccount::where('user_id',auth()->user()->id)->first();
        if($bank==null){
            abort(403,"no user found");
        }
        if($bank['credit_card_blocked']){
            abort(403,"your credit card is blocked please requesst a new one");
        }
        if($bank['balance']<$temp['withdrawAmount']){
            abort(403,"error: insufficient funds try withdrawing less");
        }
        $curr=Carbon::now();
        $bank->update([
        'balance'=>($bank['balance']-$temp['withdrawAmount']),
        'interest_date'=>$curr,
        'tax_date'=>$curr
        ]);
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
            abort(403,"invalid credentials");
        }
    }

    public function createdAccount(Request $request){
        $temp=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6',
        ]);
        $temp['password']=bcrypt($temp['password']);
        $nameBool=User::where('name',$temp['name'])->first();
        $emailBool=User::where('email',$temp['email'])->first();
        if($nameBool!=null){
            abort(403,"name is already taken");
        }
        if($emailBool!=null){
            abort(403,"email is already taken");
        }
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
            "depositoAmount"=>'required|numeric|min:1',
        ]);
        if($temp['depositoAmount']<10000000){
            abort(403,"at least 10 000 000 is required");
        }
        $bank=BankAccount::where('user_id',auth()->user()->id)->first();
        if($bank==null){
            abort(403,"no credit card found");
        }
        if($bank['credit_card_blocked']){
            abort(403,"your credit card is blocked please request a new one");
        }
        if($temp['depositoAmount']>$bank['balance']){
            abort(403,"insufficient funds");
        }
        $currDate=Carbon::now();
        if($bank['deposito_date']==null){
            $bank->update(['deposito_date'=>$currDate]);
        }
        $bank->update([
        'deposito_balance'=>($bank['deposito_balance']+$temp['depositoAmount']),
        'balance'=>($bank['balance']-$temp['depositoAmount']),
        'deposito_last_updated'=>$currDate
        ]);
        return "successfully deposited to deposito balance";
    }

    public function requestComplete(){
        $faker=Faker::create();
        $bank=BankAccount::where('user_id',auth()->user()->id)->first();
        if($bank==null){
            abort(403,"no user found");
        }
        if($bank['credit_card_number']==null||$bank['credit_card_blocked']==true){
            $temp=$faker->unique()->creditCardNumber('Visa',true);
            $bank->update([
            'credit_card_number'=>$temp,
            'credit_card_blocked'=>false
            ]);
            return redirect('/');
        }else{
            abort(403,"you are not eligible to request a credit card");
        }
    }

    public function blockCreditCard(){
        return view("blockcreditcard");
    }

    public function blockCompleted(Request $request){
        $temp = $request->validate([
            "target" => 'required',
        ]);
    
        $bank = BankAccount::where('credit_card_number', $temp['target'])->first();
        if ($bank == null) {
            abort(403,"no credit card found");
        } else {
            $bank->update(['credit_card_blocked' => true]);
            return redirect('/');
        }
    }

    public function transfer(){
        return view("transfer");
    }
    

    public function transferCompleted(Request $request){
        $temp=$request->validate([
            'receiver'=>'required',
            'amount'=>'required|numeric|min:1',
            'password'=>'required'
        ]);
        $curr=auth()->user()->id;
        $bank=BankAccount::where('user_id',$curr)->first();
        if($bank==null){
            abort(403,"no user found");
        }
        $receiver=BankAccount::where('credit_card_number', $temp['receiver'])->first();
        if($receiver==null){
            abort(403,"no matching credit card found");
        }
        if($bank['credit_card_blocked']){
            abort(403,"your credit card is blocked please requesst a new one"); 
        }
        if(!Hash::check($temp['password'],auth()->user()->password)){
            abort(403,"incorrect password");
        }
        if($bank['balance']<$temp['amount']){
            abort(403,"insufficient funds");
        }
        $currDate=Carbon::now();
        $bank->update([
        'balance'=>$bank['balance']-$temp['amount'],
        'interest_date'=>$currDate,
        'tax_date'=>$currDate
        ]);
        $receiver->update([
        'balance'=>$receiver['balance']+$temp['amount'],
        'interest_date'=>$currDate,
        'tax_date'=>$currDate
        ]);
        return "successfully transferred balance";
    }
  
    public function changedProfile(Request $request){
        $temp=$request->validate([
            'password'=>'required',
              'newEmail'=>'required',
              'newName'=>'required'
              ]);
            $acc=User::find(auth()->user()->id);
            $nameBool=User::where('name',$temp['newName'])->first();
            $emailBool=User::where('email',$temp['newEmail'])->first();
            if($nameBool!=null){
                abort(403,"name is already taken");
            }
            if($emailBool!=null){
                abort(403,"email is already taken");
            }
              if (Hash::check($temp['password'], $acc->password)) {
                  $acc->update([
                  'email' => $temp['newEmail'],
                  'name' => $temp['newName']
                ]);
                  return redirect('/');
            }else{
            abort(403,"wrong password");
            }
      }

      public function withdrawDep(){
        return view('withdrawdep');
      }

      public function withdrawDepComplete(){
        $acc=BankAccount::where('user_id',auth()->user()->id)->first();
        $temp=Carbon::parse($acc['deposito_date']);
        if(($temp->diffInMinutes(Carbon::now()))<1){
            abort(403,"wait at least 1 minute after your first deposito to withdraw");
        }
        $acc->update([
            'balance'=>$acc['balance']+$acc['deposito_balance'],
            'deposito_balance'=>0,
            'deposito_last_updated'=>null,
            'deposito_date'=>null
        ]);
        return "successfully withdrawed deposito";
      }
}