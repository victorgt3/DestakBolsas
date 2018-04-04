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

Route::get('/','WelcomeController@index');
Route::get('welcome',['uses'=>'WelcomeController@ListarCategoria','as'=>'template.body']);
Route::get('/contato',['uses'=>'ContatoController@index','as'=>'contato.index']);

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
Route::get('addfotos{id}', ['uses'=>'Admin\ProdutoController@Addfotos','as'=>'produtos.addfotos']);
Route::get('listaprodutos', ['uses'=>'Admin\ProdutoController@lista','as'=>'produtos.lista']);
Route::post('produtos/salvar', ['uses'=>'Admin\ProdutoController@salvar','as'=>'produtos.salvar']);
Route::get('produtosedit{id}', ['uses'=>'Admin\ProdutoController@edit','as'=>'produtos.edit']);
Route::put('produtos/update{id}', ['uses'=>'Admin\ProdutoController@update','as'=>'produtos.update']);
Route::get('produtos/destroy/{id}', ['uses'=>'Admin\ProdutoController@destroy','as'=>'produtos.destroy']);
Route::post('produtos/salvarFotos/{id}', ['uses'=>'Admin\ProdutoController@SaveFotos','as'=>'produtos.salvarFotos']);

Route::get('/fotoprodutos/destroy/{id}', ['uses'=>'Admin\FotoProdutoController@destroy','as'=>'fotoprodutos.destroy']);

Route::get('banners', ['uses'=>'Admin\BannerController@index','as'=>'banners.index']);
Route::post('banners/save', ['uses'=>'Admin\BannerController@save','as'=>'banners.save']);


Route::get('slides', ['uses'=>'Admin\SlideController@index','as'=>'slides.index']);
Route::post('slides/salvar', ['uses'=>'Admin\SlideController@store','as'=>'slides.store']);