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
   public function imagens()
   {
       return $this->hasMany('App\FotoProduto');
   }

   public function addImagens(FotoProduto $img)
   {
       return $this->imagens()->save($img);
   }
    public function categoria()
   {
       return $this->belongsTo('App\Categoria');
   }

    public function marca()
   {
       return $this->belongsTo('App\Marca');
   }     
}
