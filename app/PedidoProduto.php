<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    protected $fillable = [
        'pedido_id','produto_id',
        'status','valor',
        'desconto','cupom_desconto_id'
        ];
}
