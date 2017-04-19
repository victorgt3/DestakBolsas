<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        
        'categorias_id','nome',
        'descricao','valor',
        'ativo','marcas_id'
        
        ];
}
