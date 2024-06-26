<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BankAccount;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $faker=Faker::create();
       
        DatabaseSeeder::students();
        for($i=0;$i<100;$i++){
            $temp=User::factory()->create();
            BankAccount::factory()->create([
                'user_id'=>$temp['id'],
                'deposito_last_updated'=>$temp['created_at'],
                'credit_card_number'=>$faker->unique()->creditCardNumber('Visa',true),
                'interest_date'=>$temp['created_at'],
                'tax_date'=>$temp['created_at']
            ]);
        }
    }

    private function students(): void{
        $temp=User::factory()->create([
            'name'=>"ahmad",
            'email'=>"ahmad@email.com",
            'password'=>bcrypt("123456"),
            'admin'=>true
        ]);
        BankAccount::factory()->create([
            "balance"=>53523,
            "user_id"=>$temp['id'],
            'deposito_last_updated'=>$temp['created_at'],
            'interest_date'=>$temp['created_at'],
            'tax_date'=>$temp['created_at']
        ]);

        $temp=User::factory()->create([
            'name'=>"jason",
            'email'=>"jason@email.com",
            'password'=>bcrypt("123456"),
            'admin'=>true
        ]);
        BankAccount::factory()->create([
            "balance"=>53523,
            "user_id"=>$temp['id'],
            'deposito_last_updated'=>$temp['created_at'],
            'interest_date'=>$temp['created_at'],
            'tax_date'=>$temp['created_at']
        ]);

        $temp=User::factory()->create([
            'name'=>"jervis",
            'email'=>"jervis@email.com",
            'password'=>bcrypt("123456"),
            'admin'=>true
        ]);
        BankAccount::factory()->create([
            "balance"=>53523,
            "user_id"=>$temp['id'],
            'deposito_last_updated'=>$temp['created_at'],
            'interest_date'=>$temp['created_at'],
            'tax_date'=>$temp['created_at']
        ]);

        $temp=User::factory()->create([
            'name'=>"wilmer",
            'email'=>"wilmer@email.com",
            'password'=>bcrypt("123456"),
            'admin'=>true
        ]);
        BankAccount::factory()->create([
            "balance"=>53523,
            "user_id"=>$temp['id'],
            'deposito_last_updated'=>$temp['created_at'],
            'interest_date'=>$temp['created_at'],
            'tax_date'=>$temp['created_at']
        ]);

        $temp=User::factory()->create([
            'name'=>"fablius",
            'email'=>"fablius@email.com",
            'password'=>bcrypt("123456"),
            'admin'=>true
        ]);
        BankAccount::factory()->create([
            "balance"=>53523,
            "user_id"=>$temp['id'],
            'deposito_last_updated'=>$temp['created_at'],
            'interest_date'=>$temp['created_at'],
            'tax_date'=>$temp['created_at']
        ]);
    }
}