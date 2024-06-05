<?php
namespace App\Models;
class BankAccount{
    public static function nodatabasedata(){
        return[
            [
                'id'=>"01",
                "name"=>"ahmad",
                "email"=>"ahmad@email.com",
                "telNo"=>"123456",
                "balance"=>"53523",
                "password"=>"123456"
            ],
            [
                'id'=>"02",
                "name"=>"jason",
                "email"=>"jason@email.com",
                "telNo"=>"123456",
                "balance"=>"53523",
                "password"=>"123456"
            ],
            [
                'id'=>"03",
                "name"=>"miguel",
                "email"=>"miguel@email.com",
                "telNo"=>"123456",
                "balance"=>"53523",
                "password"=>"123456"
            ],
            [
                'id'=>"04",
                "name"=>"jervis",
                "email"=>"jervis@email.com",
                "telNo"=>"123456",
                "balance"=>"53523",
                "password"=>"123456"
            ],
            [
                'id'=>"05",
                "name"=>"wilmer",
                "email"=>"wilmer@email.com",
                "telNo"=>"123456",
                "balance"=>"53523",
                "password"=>"123456"
            ],
            [
                'id'=>"06",
                "name"=>"fablius",
                "email"=>"fablius@email.com",
                "telNo"=>"123456",
                "balance"=>"53523",
                "password"=>"123456"
            ]
            
            ];

    }
    public static function findId($id){
        $accs=self::nodatabasedata();
        foreach($accs as $acc){
            if($acc['id']=$id){
                return $acc;
            }
        }
        return "no account found";

        
    }
}