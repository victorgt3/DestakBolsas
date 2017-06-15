<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/categorias', ['uses'=>'Admin\CategoriaController@index','as'=>'categorias.index']);
Route::post('/categorias/salvar', ['uses'=>'Admin\CategoriaController@salvar','as'=>'categorias.salvar']);
Route::get('/categorias/destroy/{id}', ['uses'=>'Admin\CategoriaController@destroy','as'=>'categorias.destroy']);
Route::put('/categorias/update/{id}', ['uses'=>'Admin\CategoriaController@update','as'=>'categorias.update']);
Route::get('categorias{id}', ['uses'=>'Admin\CategoriaController@edit','as'=>'categorias.edit']);


Route::resource('/marcas', 'Admin\MarcaController');
Route::get('/marcas/destroy/{id}', ['uses'=>'Admin\MarcaController@destroy','as'=>'marcas.destroy']);
Route::get('edit{id}', ['uses'=>'Admin\MarcaController@edit','as'=>'marcas.edit']);

Route::get('produtos', ['uses'=>'Admin\ProdutoController@index','as'=>'produtos.index']);
Route::get('listaprodutos', ['uses'=>'Admin\ProdutoController@lista','as'=>'produtos.lista']);
Route::post('produtos/salvar', ['uses'=>'Admin\ProdutoController@salvar','as'=>'produtos.salvar']);
Route::get('produtosedit{id}', ['uses'=>'Admin\ProdutoController@edit','as'=>'produtos.edit']);
Route::put('produtos/update{id}', ['uses'=>'Admin\ProdutoController@update','as'=>'produtos.update']);

