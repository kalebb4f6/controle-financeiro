<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("bank_account_id")->references("id")->on("bank_accounts");
            $table->foreignUuid('customer_id')->nullable()->references('id')->on('customers');
            $table->string("name");
            $table->string("flag");
            $table->char("day_of_close", 2);
            $table->boolean("preferential")->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_cards');
    }
};
