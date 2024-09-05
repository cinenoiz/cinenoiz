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
        Schema::create('filme_genero', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_filme');
            $table->foreign('id_filme')->references('id')->on('filme')->onDelete('cascade');

            $table->unsignedBigInteger('id_genero');
            $table->foreign('id_genero')->references('id')->on('genero')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filme_genero');
    }
};
