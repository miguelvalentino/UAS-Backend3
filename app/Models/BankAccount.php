<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable=[
        'balance','user_id','deposito_balance','deposito_last_updated','interest_date','credit_card_number','credit_card_blocked',"tax_date"
    ];
}
