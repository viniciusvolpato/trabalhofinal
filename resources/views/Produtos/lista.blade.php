@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Produtos
                        <a class="pull-right" href="{{ url('produtos/novo') }}">Novo produto</a>
                    </div>

                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif

                    <div class="panel-body">


                        <table id="data_table" class="table">
                            <thead><tr>
                            <th>Equipamento</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>IMEI</th>
                            <th>Ações</th>
                            </thead>
                            <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->equipamento }}</td>
                                    <td>{{ $produto->marca }}</td>
                                    <td>{{ $produto->modelo }}</td>
                                    <td>{{ $produto->imei }}</td>

                                    <td>
                                        <a href="produtos/{{ $produto->id }}/editar" class="btn btn-default btn-sm">Editar</a>
                                        {!! Form::open(['method' => 'DELETE', 'url' => '/produtos/'.$produto->id, 'style' => 'display: inline;']) !!}
                                        <button type="submit" class="btn btn-default btn-sm">Excluir</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
