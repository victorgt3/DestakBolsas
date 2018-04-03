<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Storage;
use Image;
use App\Banner;

class BannerController extends Controller
{
    public function index()
    {
        return view('banner.index');
    }
    public function save(Request $request)
    {
        $registro = $request->all();
        $this->validate($request,[
           'nome' =>  'required|unique:banners',
         ],[ 
            'nome.required'=> 'Prencha uma nome',
            'nome.unique'=> 'Registro já existe!',
         ]);

        $registro = new Banner();
        $registro->nome = $request->get('nome');
        $registro->descricao = $request->get('descricao');

         if($request->hasFile('imagem'))
         {
            
            $imagem = $request->file('imagem');
            $diretorio = "upload/banners/".$request->nome;
            File::makeDirectory($diretorio, 0777, true , true);
            $nomeArquivo = rand(11111,99999).'.'.$imagem->getClientOriginalExtension();         
            $imagem = Image::make($imagem->getRealPath());
            $imagem->resize(900,350)->save($diretorio.'/'.$nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
                 
         }
         
            $registro->save();
            \Session::flash('flash_message',[
                'msg'=>"Slide adicionado com Sucesso!",
                'class'=>"alert-success"
            ]);

            return redirect()->route('banners.index');   

    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {

    }
}
