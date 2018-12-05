@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Informe abaixo as informações do cliente
                        <a class="pull-right" href="{{ url('clientes') }}">Listagem de cliente</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif

                        @if(Request::is('*/editar'))
                            {!! Form::model($cliente, ['method' => 'PATCH', 'id' => 'validation', 'role' => 'form',
                            'data-toggle' => 'validator', 'url' => 'clientes/'.$cliente->id]) !!}
                        @else
                            {!! Form::open(['url' => 'clientes/salvar', 'id' => 'validation', 'role' => 'form',
                            'data-toggle' => 'validator']) !!}
                        @endif

                            <div class="form-group">
                                {!! Form::label('nome', 'Nome')!!}
                                {!! Form::input('text', 'nome', null,['class' => 'form-control', 'required', 'placeholder' => 'Nome completo']) !!}
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('cpf', 'CPF')!!}
                                {!! Form::input('string', 'cpf', null,['class' => 'form-control', 'required', 'placeholder' => '___.___.___-__']) !!}
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('endereco', 'Endereço')!!}
                                {!! Form::input('text', 'endereco', null,['class' => 'form-control', 'required', 'placeholder' => 'Endereço do cliente']) !!}
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('telefone', 'Telefone')!!}
                                {!! Form::input('text', 'telefone', null,['class' => 'form-control', 'required', 'placeholder' => '( ) xxxxx-xxxx']) !!}
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('email', 'Email')!!}
                                {!! Form::input('text', 'email', null,['class' => 'form-control', 'required', 'placeholder' => 'Email do cliente']) !!}
                                <div class="help-block with-errors"></div>
                            </div>

                        {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $('document').ready(function(){
        $('#validation').validator();
    });
</script>
@endsection