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
           'nome.unique'=> 'Registro já existe!',
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
                $imagem->resize(700,400)->save($diretorio.'/'.$nomeArquivo);
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
    public function lista()
    {
        $produto = Produto::all();


        return view('produtos.lista',compact('produto'));
    }

    public function edit($id)
    {
        
        $produto = Produto::find($id);
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $imagem = DB::table('produtos')
                ->leftJoin('fotoprodutos', 'produtos.id', '=', 'fotoprodutos.produtos_id')
                ->where('produtos_id','=',$id)
                ->paginate(10);        
        return view('produtos.editar',compact('produto','imagem','categorias','marcas'));

    }
    public function update(Request $request, $id)
    {
      $registro = $request->all();
        $this->validate($request,[
           'categorias' =>  'required',
           'marcas' =>  'required',
           'valor' =>  'required',
       ],[
           'categorias.required'=> 'Selecione uma categoria',
           'marcas.required'=> 'Selecione uma marca',           
           'nome.unique'=> 'Registro já existe!',
           'valor.required'=> 'Prencha um valor',
       ]);
    
        $registro = Produto::find($id);
        $registro->categorias_id = $request->get('categorias');
        $registro->marcas_id = $request->get('marcas'); 
        $registro->nome = $request->get('nome'); 
        $registro->ativo = $request->get('ativo');
        $registro->valor = $request->get('valor'); 
        $registro->descricao = $request->get('descricao');
        $registro->update();     
       
        \Session::flash('flash_message',[
			'msg'=>"Produto foi atualizado com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('produtos.lista');  
    }

    public function SaveFotos(Request $request, $id)
    {
        $registro = $request->all();

        $produto = Produto::find($id);
       
        if($produto->galeria()->count()){
            $galeria = $produto->galeria()->orderBy('ordem', 'desc')->first();
            $ordemAtual = $galeria->ordem;
        }else{
            $ordemAtual = 0;
        }
        if($request->hasFile('imagens')){
            $arquivos = $request->file('imagens');
            {
                
                $url = DB::table('produtos')
                ->Join('fotoprodutos', 'produtos.id', '=', 'fotoprodutos.produtos_id')
                ->where('produtos_id','=',$id)
                ->value('url');
                
                
                if($url == null)
                {
                    foreach($arquivos as $imagem )
                    {
                        $registro = new FotoProduto();
                        $diretorio = "upload/galeria/".$produto->nome;
                        File::makeDirectory($diretorio, 0777, true , true);
                        $nomeArquivo = rand(11111,99999).'.'.$imagem->getClientOriginalExtension();         
                        $imagem = Image::make($imagem->getRealPath());
                        $imagem->resize(700,400)->save($diretorio.'/'.$nomeArquivo);
                        $registro->produtos_id = $id;
                        $registro->ordem = $ordemAtual + 1;
                        $ordemAtual++;
                        $registro->url = $diretorio.'/'.$nomeArquivo;        
                        $registro->save();
                    }
                    \Session::flash('flash_message',[
                    'msg'=>"Fotos adicionadas com Sucesso!",
                    'class'=>"alert-success"
                    ]);

    	            return redirect()->route('produtos.lista');
                }
                else
                {
                    foreach($arquivos as $imagem )
                    {
                        $registro = new FotoProduto();
                        $tes = explode("/",$url);
                        $p1 = $tes[0];
                        $p2 = $tes[1];
                        $p3 = $tes[2];
                        $diretorio = $p1."/".$p2."/".$p3;
                        $nomeArquivo = rand(11111,99999).'.'.$imagem->getClientOriginalExtension();         
                        $imagem = Image::make($imagem->getRealPath());
                        $imagem->resize(700,400)->save($diretorio.'/'.$nomeArquivo);
                        $registro->produtos_id = $id;
                        $registro->ordem = $ordemAtual + 1;
                        $ordemAtual++;
                        $registro->url = $diretorio.'/'.$nomeArquivo;        
                        $registro->save();

                    }
                   
                    \Session::flash('flash_message',[
                    'msg'=>"Fotos adicionadas com Sucesso!",
                    'class'=>"alert-success"
                    ]);

    	            return redirect()->route('produtos.lista');
                }
                
                
                          
            }
        }   
    }
    public function Addfotos($id)
    {
        $produtos = Produto::find($id);
        return view('produtos.addfotos',compact('produtos'));
    }
    public function destroy($id)
    {
        $produtos = Produto::find($id);

        if(!$produtos->deletarFotos()){
            \Session::flash('flash_message',[
			'msg'=>"Registo não pode ser deletado",
			'class'=>"alert-danger"
    	]);
            return redirect()->route('produtos.lista');
        }
        $produtos->delete();
        \Session::flash('flash_message',[
			'msg'=>"Produto foi deletado com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('produtos.lista'); 
    }
}
