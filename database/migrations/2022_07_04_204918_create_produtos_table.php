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
            $table->string('codigo');
            $table->longText('descricao');
            $table->string('quantidade');
            $table->string('valorunidade');
            $table->string('precocusto');
            $table->string('descontoItem');
            $table->string('un');
            $table->string('pesoBruto');
            $table->string('largura');
            $table->string('altura');
            $table->string('profundidade');
            $table->string('descricaoDetalhada');
            $table->string('unidadeMedida');
            $table->string('gtin');
            $table->timestamps();
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
