<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\FinancialTypeEnum;
use App\Enums\FinancialStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_releases', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid('bank_account_id');
            $table->foreignUuid('customer_id')->nullable()->references('id')->on('customers');
            $table->uuid('category_id')->nullable();
            $table->string('description');
            $table->float('value', 10, 4);
            $table->enum('type', array_column(FinancialTypeEnum::cases(), 'value'));
            $table->enum('status', array_column(FinancialStatusEnum::cases(), 'value'));
            $table->date('date');

            $table->foreign('bank_account_id')->references('id')->on('bank_accounts');

            $table->foreign('category_id')->references('id')->on("categories");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_releases');
    }
};
