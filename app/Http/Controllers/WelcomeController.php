<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Categoria;
use App\Banner;
use App\FotoProduto;
use App\Produto;
use App\Marca;
use App\Slide;
use DB;

class WelcomeController extends Controller
{
    /**Listar Categoria **/

    public function index ()
    {
        $produto = DB::table('produtos')
                        ->Join('fotoprodutos', 'produtos.id', '=', 'fotoprodutos.produtos_id')
                        ->get();
        $categorias = Categoria::orderBy('nome', 'asc')->get();
        $banner = Banner::all();
         
        return view('welcome',compact('categorias','banner','produto'));

    }
   
   public function ListarCategoria()
   {
        $produto = Produto::all();
        $categorias = Categoria::orderBy('nome', 'asc')->get();
        $banner = Banner::all();
       
        return view('template.body',compact('categorias','banner','produto'));
   }
}
