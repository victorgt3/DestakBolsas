<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Storage;
use Image;
use App\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('slide.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $registro = $request->all();
        $this->validate($request,[
           'nome' =>  'required|unique:slides',
         ],[ 
            'nome.required'=> 'Prencha uma nome',
            'nome.unique'=> 'Registro já existe!',
         ]);

        $registro = new Slide();
        $registro->nome = $request->get('nome');
        $registro->descricao = $request->get('descricao');

         if($request->hasFile('imagem'))
         {
            
            $imagem = $request->file('imagem');
            $diretorio = "upload/slides/".$request->nome;
            File::makeDirectory($diretorio, 0777, true , true);
            $nomeArquivo = rand(11111,99999).'.'.$imagem->getClientOriginalExtension();         
            $imagem = Image::make($imagem->getRealPath());
            $imagem->resize(100,100)->save($diretorio.'/'.$nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
                 
         }
         
            $registro->save();
            \Session::flash('flash_message',[
                'msg'=>"Slide adicionado com Sucesso!",
                'class'=>"alert-success"
            ]);

            return redirect()->route('slides.index');   

    	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
