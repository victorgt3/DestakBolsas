<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
     protected $table = 'banners';
     protected $fillable = [
         'nome','descricao','imagem'
         ];


    public function ListaOrdenada()
    {
        $banner = 'banners'->orderBy('nome', 'asc')->get();

        return $banner;
    }     
}
