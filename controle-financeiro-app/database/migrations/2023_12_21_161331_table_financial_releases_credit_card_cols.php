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
        Schema::table('financial_releases', function (Blueprint $table) {
            $table->uuid("credit_card_id")->nullable();
            $table->foreign("credit_card_id")->references("id")->on("credit_cards");

            $table->uuid("bank_account_id")->nullable()->change();
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
            $table->uuid("bank_account_id")->change();

            $table->dropForeign(["credit_card_id"]);
            $table->dropColumn("credit_card_id");
        });
    }
};
