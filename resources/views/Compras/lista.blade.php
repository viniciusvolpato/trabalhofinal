@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ordens
                        <a type="button" class="pull-right btn btn-primary btn-sm" href="{{ url('compras/novo') }}">Nova Ordem</a>
                    </div>

                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif

                    <div class="panel-body">

                        <table id="data_table" class="table table-striped table-hover table-sm " cellspacing="0" width="100%">
                            <thead><tr>
                            <th>Ordem</th>
                            <th>Técnico</th>
                            <th>Data Entrada </th>
                            <th>Defeito do Aparelho</th>
                            <th>Situação</th>
                            <th>Valor</th>
                            <th>Data Saída</th>
                            <th>Ações</th>
                            </thead>
                            <tbody>
                            @foreach($compras as $compra)
                                <tr>
                                    <td>{{ $compra->id }}</td>
                                    <td>{{ $compra->tecnico }}</td>
                                    <td>{{ $compra->datai }}</td>
                                    <td>{{ $compra->problema }}</td>
                                    <td>{{ $compra->situacao }}</td>
                                    <td>{{ $compra->valor }}</td>
                                    <td>{{ $compra->datae }}</td>


                                    <td>
                                        <a href="{{url("compras/$compra->id/editar")}}" class="btn btn-default btn-sm">Editar</a>
                                        {!! Form::open(['method' => 'DELETE', 'url' => '/compras/'.$compra->id, 'style' => 'display: inline;']) !!}
                                        <button type="submit" class="btn btn-primary btn-sm">Excluir</button>
                                        {!! Form::close() !!}
                                        <a href="{{ url("compras/$compra->id/pdf") }}" class="btn btn-danger btn-sm">Imprimir</a>

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
