<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('empresa_id');
            $table->string('id_bling')->unique();
            $table->string('codigo')->nullable();
            $table->string('nome')->nullable();
            $table->string('fantasia')->nullable();
            $table->string('tipo')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('ie_rg')->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->string('cidade')->nullable();
            $table->string('complemento')->nullable();
            $table->string('uf')->nullable();
            $table->string('fone')->nullable();
            $table->string('email')->nullable();
            $table->string('situacao')->nullable();
            $table->string('contribuinte')->nullable();
            $table->string('site')->nullable();
            $table->string('celular')->nullable();
            $table->string('dataAlteracao')->nullable();
            $table->string('dataInclusao')->nullable();
            $table->string('sexo')->nullable();
            $table->string('clienteDesde')->nullable();
            $table->string('limiteCredito')->nullable();
            $table->string('nomeVendedor')->nullable();
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contatos');
    }
}
