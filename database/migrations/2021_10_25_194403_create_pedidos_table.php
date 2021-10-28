<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('idpedido');
            $table->integer('idcliente')->unsigned();
            $table->foreign('idcliente')->references('idcliente')->on('clientes');
            $table->integer('idproduto')->unsigned();
            $table->foreign('idproduto')->references('idproduto')->on('produtos');
            $table->integer('quantidade')->unsigned();
            $table->unsignedDecimal('preco_unitario', 10, 2);
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
