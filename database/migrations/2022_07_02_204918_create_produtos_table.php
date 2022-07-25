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
            $table->unsignedSmallInteger('categoria_id');
            $table->string('id_prod_bling');
            $table->string('codigo');
            $table->longText('descricao')->nullable();
            $table->longText('unidade')->nullable();
            $table->string('preco')->nullable();
            $table->string('precoCusto')->nullable();
            $table->string('nomeFornecedor')->nullable();
            $table->string('codigoFornecedor')->nullable();
            $table->string('marca')->nullable();
            $table->string('class_fiscal')->nullable();
            $table->string('cest')->nullable();
            $table->string('origem')->nullable();
            $table->string('idFabricante')->nullable();
            $table->string('pesoLiq')->nullable();
            $table->string('pesoBruto')->nullable();
            $table->string('estoqueMinimo')->nullable();
            $table->string('estoqueMaximo')->nullable();
            $table->string('gtin')->nullable();
            $table->string('gtinEmbalagem')->nullable();
            $table->string('larguraProduto')->nullable();
            $table->string('alturaProduto')->nullable();
            $table->string('profundidadeProduto')->nullable();
            $table->string('unidadeMedida')->nullable();
            $table->string('itensPorCaixa')->nullable();
            $table->json('estrutura')->nullable();
            $table->string('codigoPai')->nullable();
            $table->timestamps();
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
