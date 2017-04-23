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
        
        $foto = FotoProduto::all();

        $produto = new Produto();
        $produto->categorias_id = $request->get('categorias');
        $produto->marcas_id = $request->get('marcas'); 
        $produto->nome = $request->get('nome'); 
        $produto->ativo = $request->get('ativo');
        $produto->valor = $request->get('valor'); 
        $produto->descricao = $request->get('descricao');
        $produto->save();     
        
    
        if($request->hasFile('imagens')){
            
            $arquivos = $request->file('imagens');
            foreach($arquivos as $imagem ){
                $foto = new FotoProduto();
                $rand = rand(11111,99999);
                $diretorio = "img/galeria/".str_slug('_')."/";
                $ext = $file->guessClienExtension();
                $nomeArquivo = "_img_".$rand.".".$ext;
                $file->move($diretorio,$nomeArquivo);
    
                $foto->imagem = $diretorio.'/'.$nomeArquivo;
                $foto->save();
               
            }
        }

        
       
        \Session::flash('flash_message',[
			'msg'=>"Produto foi adicionado com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('produtos.index');

       
    }
}
