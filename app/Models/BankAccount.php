<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable=[
        'balance','user_id','deposito_balance','deposito_last_updated','interest_date'
    ];

    public function scopeFilter($query, array $filters){
        if($filters['balanceGreaterThan']??false){
            $query->where('balance','>',request(['balanceGreaterThan']));
        }
        if($filters['balanceLessThan']??false){
            $query->where('balance','<',request(['balanceLessThan']));
        }
    }
}
