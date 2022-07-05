<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('contato_id');
            $table->unsignedSmallInteger('empresa_id');
            $table->string('desconto')->nullable();
            $table->longText('observacoes')->nullable();
            $table->longText('observacaointerna')->nullable();
            $table->string('data')->nullable();
            $table->string('numero')->nullable();
            $table->string('numeroOrdemCompra')->nullable();
            $table->string('vendedor')->nullable();
            $table->string('valorfrete')->nullable();
            $table->string('outrasdespesas')->nullable();
            $table->string('totalprodutos')->nullable();
            $table->string('totalvenda')->nullable();
            $table->string('situacao')->nullable();
            $table->string('dataSaida')->nullable();
            $table->timestamps();

            $table->foreign('contato_id')->references('id_bling')->on('contatos');
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
        Schema::dropIfExists('pedidos');
    }
}
