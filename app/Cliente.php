<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'idcliente';
    public $timestamps = false;
    protected $fillable = array('idcliente', 'nome');
}
