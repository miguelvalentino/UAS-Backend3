<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BankAccount;
use Carbon\Carbon;

class interest extends Command
{
    protected $signature = 'app:interest';
    protected $description = 'interest';

    public function handle()
    {
        $accs=BankAccount::all();
        foreach($accs as $acc){
            $now=Carbon::parse($acc['deposito_last_updated']);
            $curr=Carbon::now();
            $diff=abs(floor($now->diffInMinutes($curr)));
            if($diff>0 && $acc['deposito_balance']>0){
                for($i=0;$i<$diff;$i++){
                    $after=$acc['deposito_balance']+(($acc['deposito_balance']*1/500));
                    $acc->update(['deposito_balance'=>$after]);
                    $temp=Carbon::parse($acc['deposito_last_updated'])->addMinute();
                    $acc->update(['deposito_last_updated'=>$temp]);
                }
            }
        }
    }
}

