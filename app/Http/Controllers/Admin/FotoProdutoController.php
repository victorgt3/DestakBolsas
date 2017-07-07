<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class FotoProdutoController extends Controller
{
   public function destroy($id)
    {
        $foto = \App\FotoProduto::find($id);
       // $url = URL::previous();
        //dd($url);
        $foto->delete();
       
        \Session::flash('flash_message',[
            'msg'=>"Categoria deletada com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->back();
    }
}
