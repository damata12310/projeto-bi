<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedSmallInteger('empresa_id');
            $table->string('codigo')->unique();
            $table->longText('descricao')->nullable();
            $table->string('quantidade')->nullable();
            $table->string('valorunidade')->nullable();
            $table->string('precocusto')->nullable();
            $table->string('descontoItem')->nullable();
            $table->string('un')->nullable();
            $table->string('pesoBruto')->nullable();
            $table->string('largura')->nullable();
            $table->string('altura')->nullable();
            $table->string('profundidade')->nullable();
            $table->string('descricaoDetalhada')->nullable();
            $table->string('unidadeMedida')->nullable();
            $table->string('gtin')->nullable();
            $table->timestamps();

            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * kXlY$drl@mj~Sd~*.~
     *
     * ,!{)%$$~?a4];5=MOK
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
