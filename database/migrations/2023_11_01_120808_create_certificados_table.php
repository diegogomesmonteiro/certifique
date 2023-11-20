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
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('config_certificado_id')->constrained('config_certificados');
            $table->foreignId('participante_id')->constrained('participantes');
            $table->foreignId('gerado_por_id')->constrained('users');
            $table->foreignId('alterado_por_id')->nullable()->constrained('users');
            $table->string('autenticacao')->unique();
            $table->boolean('publicado')->default(true);
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
        Schema::dropIfExists('certificados');
    }
};
