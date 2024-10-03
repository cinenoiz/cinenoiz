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
        Schema::create('sessao', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('dia_e_hora');
            $table->string('sala', 200);

            $table->unsignedBigInteger('id_filme');
            $table->foreign('id_filme')->references('id')->on('filme')->onDelete('cascade');

            $table->unsignedBigInteger('id_cinema');
            $table->foreign('id_cinema')->references('id')->on('cinema')->onDelete('cascade');

            $table->boolean('deleted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessao');
    }
};
