<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Categoria;
use App\Banner;
use App\FotoProduto;
use App\Produto;
use App\Marca;
use App\Slide;

class WelcomeController extends Controller
{
    /**Listar Categoria **/

    public function index (Request $id)
    {
        $categorias = Categoria::all();
        $banner = Banner::find($id);
      
        return view('welcome',compact('categorias','banner'));

    }
   
   public function ListarCategoria(Request $id)
   {
        $categorias = Categoria::all();
        $banner = Banner::find($id);

        return view('template.body',compact('categorias','banner'));
   }
}
