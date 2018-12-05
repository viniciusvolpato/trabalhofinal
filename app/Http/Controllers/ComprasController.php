<?php

namespace App\Http\Controllers;

use App\Compra;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class ComprasController extends Controller
{
    public function index()
    {
        $compras = Compra::get();
        return view('compras.lista', ['compras' => $compras]);
    }

    public function novo()
    {
        return view('compras.formulario');
    }

    public function salvar(Request $request)
    {

        $compra = new Compra();

        $compra = $compra->create($request->all());

        \Session::flash('mensagem_sucesso', 'Ordem cadastrada com sucesso!');

        return Redirect::to('compras/novo');

    }

    public function editar($id)
    {
        $compra = Compra::findOrFail($id);

        return view('compras.formulario', ['compra' => $compra]);
    }

    public function atualizar($id, Request $request)
    {
        $compra = Compra::findOrFail($id);

        $compra->update($request->all());

        \Session::flash('mensagem_sucesso', 'Ordem alterada com sucesso!');

        return Redirect::to('compras/'.$compra->id.'/editar');
    }

    public function deletar($id)
    {
        $compra = Compra::findOrFail($id);

        $compra->delete();

        \Session::flash('mensagem_sucesso', 'Ordem deletada com sucesso!');

        return Redirect::to('compras');
    }

    public function imprimir(Compra $compra)
    {
        return \PDF::loadView('compras.imprimir', ['compra' => $compra])->inline();
        return view('compras.imprimir', ['compra' => $compra]);
        return \PDF::loadFile('http://www.github.com')->inline('github.pdf');
    }
}
