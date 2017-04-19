<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = \App\marca::paginate(3);
        

    	return view('marcas.index',compact('marcas'));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\Marca::create($request->all());

    	\Session::flash('flash_message',[
			'msg'=>"marca adicionado com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('marcas.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $marcas = Marca::find($id);
        return view('marcas.editar',compact('marcas'));
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
        \App\Marca::find($id)->update($request->all());

    	\Session::flash('flash_message',[
			'msg'=>"marca foi atualizada com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('marcas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marca::find($id);

        $marca->delete();
       
        \Session::flash('flash_message',[
            'msg'=>"Marca deletada com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('marcas.index');
    }

    public function show()
    {

    }
}
