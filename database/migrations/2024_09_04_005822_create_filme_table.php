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
        Schema::create('filme', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo', 200);
            $table->string('sinopse', 2000);
            $table->boolean('deleted')->default(false);


            // Produtora FK
            $table->unsignedBigInteger('id_produtora')->nullable();
            $table->foreign('id_produtora')->references('id')->on('produtora')->onDelete('cascade');

            // Imagens
            $table->string('banner_path', 500)->nullable();
            $table->string('personagem_path', 500)->nullable();
            $table->string('cartaz_path', 500)->nullable();
            $table->string('filme1_path', 500)->nullable();
            $table->string('filme2_path', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filme');
    }
};
