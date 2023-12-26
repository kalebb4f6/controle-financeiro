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
        \App\Models\Category::firstOrCreate([
            "name" => "Servicos"
        ]);
        \App\Models\Category::firstOrCreate([
            "name" => "Mercado"
        ]);
        \App\Models\Category::firstOrCreate([
            "name" => "Lazer"
        ]);
        \App\Models\Category::firstOrCreate([
            "name" => "Transporte"
        ]);
        \App\Models\Category::firstOrCreate([
            "name" => "Saude"
        ]);
        \App\Models\Category::firstOrCreate([
            "name" => "Educacao"
        ]);
        \App\Models\Category::firstOrCreate([
            "name" => "Outros"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
