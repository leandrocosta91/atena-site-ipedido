<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $primaryKey = 'idpedido';
    public $timestamps = false;
    protected $fillable = array('idcliente', 'idproduto', 'quantidade', 'preco_unitario');

    public function calcula_rentabilidade($pedido, $produto){

        if ($pedido->preco_unitario > 0 and $produto->preco_unitario > 0) {
            if ($pedido->preco_unitario > $produto->preco_unitario) {
                return 'Rentabilidade ótima';
            } else if ((($pedido->preco_unitario * 100) / $produto->preco_unitario) >= 90 ) {
                return 'Rentabilidade boa';
            } else {
                return 'Rentabilidade ruim';
            }
        } else {
            return '';
        }
        
    }
    public static function calcula_rentabilidade_ajax($preco_unitario, $produto){

        if ($preco_unitario > $produto->preco_unitario) {
            return [
                'retorno' => 1,
                'rentabilidade' => 'Rentabilidade ótima'
            ];
        } else if ((($preco_unitario * 100) / $produto->preco_unitario) >= 90 ) {
            return [
                'retorno' => 2,
                'rentabilidade' => 'Rentabilidade boa'
            ];
        } else {
            return [
                'retorno' => 3,
                'rentabilidade' => 'Rentabilidade ruim'
            ];
        }
    }
}
