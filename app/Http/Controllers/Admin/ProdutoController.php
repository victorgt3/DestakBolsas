<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Produto;
use App\Marca;
use App\Categoria;
use App\FotoProduto;
use Image;
use Storage;


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
        $registro = $request->all();
        $this->validate($request,[
           'categorias' =>  'required',
           'marcas' =>  'required',
           'nome' => 'required|unique:produtos',
           'valor' =>  'required',
       ],[
           'categorias.required'=> 'Selecione uma categoria',
           'marcas.required'=> 'Selecione uma marca',           
           'nome.required'=> 'Prencha o nome',
           'nome.unique'=> 'O nome já existente',
           'valor.required'=> 'Prencha um valor',
       ]);
    
        $registro = new Produto();
        $registro->categorias_id = $request->get('categorias');
        $registro->marcas_id = $request->get('marcas'); 
        $registro->nome = $request->get('nome'); 
        $registro->ativo = $request->get('ativo');
        $registro->valor = $request->get('valor'); 
        $registro->descricao = $request->get('descricao');
        $registro->save();     
        $produto = Produto::find($registro->id);
        $id = $registro->id;
        
        if($produto->galeria()->count()){
            $galeria = $produto->galeria()->orderBy('ordem', 'desc')->first();

            $ordemAtual = $galeria->ordem;
        }else{
            $ordemAtual = 0;
        }
        if($request->hasFile('imagens')){
            $arquivos = $request->file('imagens');
            foreach($arquivos as $imagem ){
                $registro = new FotoProduto();
                $diretorio = "upload/galeria/".str_slug($request->get('nome'));
                File::makeDirectory($diretorio, 0777, true , true);
                $nomeArquivo = rand(11111,99999).'.'.$imagem->getClientOriginalExtension();         
                $imagem = Image::make($imagem->getRealPath());
                $imagem->resize(100,100)->save($diretorio.'/'.$nomeArquivo);
                $registro->produtos_id = $id;
                $registro->ordem = $ordemAtual + 1;
                $ordemAtual++;
                $registro->url = $diretorio.'/'.$nomeArquivo;        
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
