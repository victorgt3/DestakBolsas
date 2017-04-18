<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index()
    {
    	$categorias = \App\categoria::paginate(3);
        

    	return view('categorias.index',compact('categorias'));
    }

    public function salvar(Request $request)
    {
    	\App\Categoria::create($request->all());

    	\Session::flash('flash_message',[
			'msg'=>"categoria adicionado com Sucesso!",
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
