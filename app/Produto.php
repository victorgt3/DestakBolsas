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
   public function galeria()
   {
       return $this->hasMany('App\FotoProduto','produtos_id');
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

   public function deletarFotos()
   {
       foreach($this->galeria as $foto)
       {
            $foto->delete();
       }

       return true;
   }
   
}
