<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class ProdutosController extends Controller
{
public function index()
{
    $produtos = Produto::get();
    return view('produtos.lista', ['produtos' => $produtos]);
}

    public function novo()
    {
        return view('produtos.formulario');
    }

    public function salvar(Request $request)
    {

        $produto = new Produto();

        $produto = $produto->create($request->all());

        \Session::flash('mensagem_sucesso', 'Produto cadastrado com sucesso!');

        return Redirect::to('produtos/novo');

    }

    public function editar($id)
    {
        $produto = Produto::findOrFail($id);

        return view('produtos.formulario', ['produto' => $produto]);
    }

    public function atualizar($id, Request $request)
    {
        $produto = Produto::findOrFail($id);

        $produto->update($request->all());

        \Session::flash('mensagem_sucesso', 'Produto alterado com sucesso!');

        return Redirect::to('produtos/'.$produto->id.'/editar');
    }

    public function deletar($id)
    {
        $produto = produto::findOrFail($id);

        $produto->delete();

        \Session::flash('mensagem_sucesso', 'Produto deletado com sucesso!');

        return Redirect::to('produtos');
    }


}
