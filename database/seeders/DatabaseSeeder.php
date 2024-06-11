<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BankAccount;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        DatabaseSeeder::students();
    }

    private function students(): void{
        BankAccount::factory()->create(
            [
                "name"=>"ahmad",
                "email"=>"ahmad@email.com",
                "telno"=>"123456",
                "balance"=>53523,
                "password"=>"123456"
            ]
            );

        BankAccount::factory()->create(
            [
                "name"=>"jason",
                "email"=>"jason@email.com",
                "telno"=>"123456",
                "balance"=>53523,
                "password"=>"123456"
            ]
            );

        BankAccount::factory()->create(
            [
                "name"=>"jervis",
                "email"=>"jervis@email.com",
                "telno"=>"123456",
                "balance"=>53523,
                "password"=>"123456"
            ]
            );
        
        BankAccount::factory()->create(
            [
                "name"=>"wilmer",
                "email"=>"wilmer@email.com",
                "telno"=>"123456",
                "balance"=>53523,
                "password"=>"123456"
            ]
            );
        
        BankAccount::factory()->create(
            [
                "name"=>"fablius",
                "email"=>"fablius@email.com",
                "telno"=>"123456",
                "balance"=>53523,
                "password"=>"123456"
            ]
            );
    }
}
