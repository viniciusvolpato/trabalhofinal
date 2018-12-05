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

Route::get('usuarios', 'UsuariosController@index');



Route::get('/','HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' =>  'auth'], function (){
    Route::get('clientes', 'ClientesController@index');
    Route::get('clientes/novo', 'ClientesController@novo');
    Route::get('clientes/{cliente}/editar', 'ClientesController@editar');
    Route::post('clientes/salvar', 'ClientesController@salvar');
    Route::patch('clientes/{cliente}', 'ClientesController@atualizar');
    Route::delete('clientes/{cliente}', 'ClientesController@deletar');


    Route::get('compras', 'ComprasController@index');
    Route::get('compras/novo', 'ComprasController@novo');
    Route::get('compras/{compra}/editar', 'ComprasController@editar');
    Route::post('compras/salvar', 'ComprasController@salvar');
    Route::patch('compras/{compra}', 'ComprasController@atualizar');
    Route::delete('compras/{compra}', 'ComprasController@deletar');
    Route::get('compras/{compra}/pdf',   'ComprasController@imprimir');


    Route::get('produtos', 'ProdutosController@index');
    Route::get('produtos/novo', 'ProdutosController@novo');
    Route::get('produtos/{produto}/editar', 'ProdutosController@editar');
    Route::post('produtos/salvar', 'ProdutosController@salvar');
    Route::patch('produtos/{produto}', 'ProdutosController@atualizar');
    Route::delete('produtos/{produto}', 'ProdutosController@deletar');
});