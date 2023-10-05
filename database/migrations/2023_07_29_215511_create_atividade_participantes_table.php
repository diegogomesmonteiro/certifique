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
        Schema::create('atividade_participantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atividade_id')->constrained('atividades');
            $table->foreignId('participante_id')->constrained('participantes');
            $table->foreignId('perfil_id')->constrained('perfils');
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
        Schema::dropIfExists('atividade_participantes');
    }
};
