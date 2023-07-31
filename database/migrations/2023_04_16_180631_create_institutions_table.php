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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_da_ies');
            $table->string('filantropica');
            $table->string('organizacao_academica');
            $table->string('codigo_municipio_ibge');
            $table->string('municipio');
            $table->string('uf');
            $table->string('situacao_ies');
            $table->string('nome_da_ies');
            $table->string('sigla');
            $table->string('categoria_da_ies');
            $table->string('comunitaria');
            $table->string('confessional');
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
        Schema::dropIfExists('institutions');
    }
};
