<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoEmail;

class ContatoController extends Controller
{
    public function index()
    {
        return view('contato.index');
    }

    public function enviaContato(Request $request)
    {
        Mail::to('stillusbolsas@outlook.com')->send(new ContatoEmail($request));
    }
}
