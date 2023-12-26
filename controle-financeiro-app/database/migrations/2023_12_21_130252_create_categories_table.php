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
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("user_id")->nullable()->references('id')->on('users');
            $table->foreignUuid("parent_category_id")->nullable();
            $table->string("name");
            $table->string("icon")->nullable();

            $table->timestamps();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent_category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
