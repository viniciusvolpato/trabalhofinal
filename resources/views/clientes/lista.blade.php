@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-15 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Clientes
                        <a class="pull-right" href="{{ url('clientes/novo') }}">Novo cliente</a>
                    </div>

                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif

                    <div class="panel-body">

                        <table id="data_table" class="table">
                            <thead><tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Ações</th></tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->nome }}</td>
                                        <td>{{ $cliente->cpf }}</td>
                                        <td>{{ $cliente->endereco }}</td>
                                        <td>{{ $cliente->telefone }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td>
                                            <a href="clientes/{{ $cliente->id }}/editar" class="btn btn-default btn-sm">Editar</a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => '/clientes/'.$cliente->id, 'style' => 'display: inline;']) !!}
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
