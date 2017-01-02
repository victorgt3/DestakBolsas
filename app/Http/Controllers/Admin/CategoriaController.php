<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index()
    {
    	$categorias = \App\Categoria::paginate(15);

    	return view('categorias.index',compact('categorias'));
    }

    public function salvar(Request $request)
    {
    	\App\Categoria::create($request->all());

    	\Session::flash('flash_message',[
			'msg'=>"categoria adicionado com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('categorias');
    }
}
