<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Marca;
use App\Categoria;
use App\FotoProduto;

class ProdutoController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $produto = Produto::all();
        return view('produtos.index',compact('produto','categorias','marcas'));
    }

    public function salvar(Request $request)
    {    
        
        $produto = FotoProduto::all();
       
        $registro = $request->all();
    
        $registro = new Produto();
        $registro->categorias_id = $request->get('categorias');
        $registro->marcas_id = $request->get('marcas'); 
        $registro->nome = $request->get('nome'); 
        $registro->ativo = $request->get('ativo');
        $registro->valor = $request->get('valor'); 
        $registro->descricao = $request->get('descricao');

        $registro->save();     
        
        $id = $registro->id;


        
        if($request->hasFile('imagens')){
            
            $arquivos = $request->file('imagens');
            foreach($arquivos as $imagem ){
                $registro = new FotoProduto();
                $rand = rand(11111,99999);
                $diretorio = "img/galeria/";
                $ext = $imagem->guessClientExtension();
                $nomeArquivo = "_img_".$rand.".".$ext;
                $imagem->move($diretorio,$nomeArquivo);
                $registro->produtos_id = $id;
                $registro->imagem = $diretorio.'/'.$nomeArquivo;
                $registro->save();
               
            }
        }

        
       
        \Session::flash('flash_message',[
			'msg'=>"Produto foi adicionado com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('produtos.index');

       
    }
}
