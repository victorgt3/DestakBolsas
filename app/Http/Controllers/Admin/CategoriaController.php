<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        
    	$categorias = Categoria::orderBy('nome','asc')->paginate(3);

    	return view('categorias.index',compact('categorias'));
    }
    
    public function salvar(Request $request)
    {
         $this->validate($request,[
           'nome' =>  'required|unique:categorias',
         ],[
            'nome.required'=> 'Prencha uma categoria',
            'nome.unique'=> 'Registro já existe!',
         ]);
    	\App\Categoria::create($request->all());

    	\Session::flash('flash_message',[
			'msg'=>"categoria adicionado com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('categorias.index');
    }
    public function edit($id)
    {
       $categorias = \App\Categoria::find($id);
        return view('categorias.editar',compact('categorias'));
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
        $this->validate($request,[
           'nome' =>  'required|unique:categorias',
         ],[
            'nome.required'=> 'Prencha uma categoria',
            'nome.unique'=> 'Registro já existe!',
         ]);
        \App\Categoria::find($id)->update($request->all());

    	\Session::flash('flash_message',[
			'msg'=>"categoria foi atualizada com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('categorias.index');
    }
	 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorias = \App\Categoria::find($id);

        $categorias->delete();
       
        \Session::flash('flash_message',[
            'msg'=>"Categoria deletada com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('categorias.index');
    }
}
