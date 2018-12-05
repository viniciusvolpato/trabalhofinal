<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
class UsuariosController extends Controller
{
    public function index()
    {
        return view('usuarios', [
            'texto'=> 'Lista de usuarios',
            'checagem' => true,
            'usuarios' => ['usuario1', 'usuario2', 'usuario3', 'usuario4']
        ]);
    }
}
