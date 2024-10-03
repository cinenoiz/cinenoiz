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
        Schema::create('ingresso', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nome_usuario', 200);
            $table->string('cpf_usuario', 200);

            $table->unsignedBigInteger('id_sessao');
            $table->foreign('id_sessao')->references('id')->on('sessao')->onDelete('cascade');


            $table->boolean('validado')->default(false);
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
        Schema::dropIfExists('ingresso');
    }
};
