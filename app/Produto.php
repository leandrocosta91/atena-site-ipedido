<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $primaryKey = 'idproduto';
    public $timestamps = false;
    protected $fillable = array('nome', 'preco_unitario', 'multiplo');
}
