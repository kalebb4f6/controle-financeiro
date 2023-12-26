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
    public function up()
    {
        Schema::create('installments_contracts', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->integer("installments_number");
            $table->date("first_due_date");
            $table->timestamps();
        });
        Schema::table('financial_releases', function (Blueprint $table) {
            $table->foreignUuid("installment_contract_id")->nullable()->references("id")->on("installments_contracts");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('financial_releases', function (Blueprint $table) {
            $table->dropForeign(["installment_contract_id"]);
            $table->dropColumn("installment_contract_id");
        });
        Schema::dropIfExists('installments_contracts');
    }
};
