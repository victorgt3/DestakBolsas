<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoProduto extends Model
{
    protected $table = 'fotoprodutos';

    protected $fillable = [
        
        'produtos_id','imagem'
        
        ];
        
   public function produto()
   {
       return $this->belongsTo('App\Produto');
   }     
}
