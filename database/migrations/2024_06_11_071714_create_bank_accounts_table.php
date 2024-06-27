<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->float('balance',10,2)->default(0);
            $table->float('deposito_balance',10,2)->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timeStamp("deposito_last_updated")->nullable();
            $table->timeStamp("deposito_date")->nullable();
            $table->String('credit_card_number')->unique()->nullable();
            $table->boolean('credit_card_blocked')->nullable()->default(false);
            $table->timeStamp("interest_date")->nullable();
            $table->timeStamp("tax_date")->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
