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
        Schema::create('cinema', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 200);
            $table->string('logradouro', 200);
            $table->string('numero', 200);
            $table->string('cep', 200);
            $table->string('bairro', 200);
            $table->string('cidade', 200);
            $table->string('uf', 200);
            $table->string('latitude', 200);
            $table->string('longitude', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinema');
    }
};
