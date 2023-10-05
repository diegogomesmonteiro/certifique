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
        Schema::create('atividade_participante_temporarios', function (Blueprint $table) {
            $table->id();
            $table->string('atividade');
            $table->string('participante_nome');
            $table->string('participante_cpf');
            $table->string('participante_email');
            $table->boolean('importacao_concluida')->default(false);
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
        Schema::dropIfExists('atividade_participante_temporarios');
    }
};
