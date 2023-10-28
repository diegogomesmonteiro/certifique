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
        Schema::create('config_certificados', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->foreignId('evento_id')->constrained('eventos');
            $table->foreignId('atividade_id')->constrained('atividades')->nullable();
            $table->string('layout')->default('img/certificado.jpg');
            $table->text('texto');
            $table->string('tipo')->default('Geral');
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
        Schema::dropIfExists('config_certificado');
    }
};
