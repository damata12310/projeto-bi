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
            $table->string('desconto');
            $table->longText('observacoes');
            $table->longText('observacaointerna');
            $table->string('data');
            $table->string('numero');
            $table->string('numeroOrdemCompra');
            $table->string('vendedor');
            $table->string('valorfrete');
            $table->string('outrasdespesas');
            $table->string('totalprodutos');
            $table->string('totalvenda');
            $table->string('situacao');
            $table->string('dataSaida');
            $table->string();
            $table->string();
            $table->string();
            $table->string();
            $table->string();
            $table->string();
            $table->string();
            $table->timestamps();

            $table->foreign('contato_id')->references('id_bling')->on('contatos');
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
