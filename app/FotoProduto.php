<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoProduto extends Model
{
    protected $table = 'fotoprodutos';

    protected $fillable = [
        
        'produtos_id','url','ordem'
        
        ];
        
   public function produto()
   {
       return $this->belongsTo('App\Produto','produtos_id');
   }     
}
