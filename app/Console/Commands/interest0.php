<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BankAccount;
use Carbon\Carbon;

class interest0 extends Command
{
    protected $signature = 'app:interest0';
    protected $description = 'interest for balance';

    public function handle()
    {
        $accs=BankAccount::all();
        foreach($accs as $acc){
            $now=Carbon::parse($acc['interest_date']);
            $curr=Carbon::now();
            $diff=abs(floor($now->diffInMinutes($curr)));
            if($diff>0 && $acc['balance']>0){
                for($i=0;$i<$diff;$i++){
                    $after=$acc['balance']+(($acc['balance']*1/1000));
                    $acc->update(['balance'=>$after]);
                    $temp=Carbon::parse($acc['interest_date'])->addMinute();
                    $acc->update(['interest_date'=>$temp]);
                }
            }
        }
    }
}

