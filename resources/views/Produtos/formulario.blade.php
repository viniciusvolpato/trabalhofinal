@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Informe abaixo as informações dos produtos
                        <a class="pull-right" href="{{ url('produtos') }}">Listagem de produtos</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif

                        @if(Request::is('*/editar'))
                            {!! Form::model($produto, ['method' => 'PATCH', 'id' => 'validation', 'role' => 'form',
                            'data-toggle' => 'validator', 'url' => 'produtos/'.$produto->id]) !!}
                        @else
                                {!! Form::open(['url' => 'produtos/salvar', 'id' => 'validation', 'role' => 'form',
                                'data-toggle' => 'validator']) !!}
                        @endif

                            {!! Form::open(['url' => 'produtos/salvar']) !!}

                        <div class="form-group">
                        {!! Form::label('equipamento', 'Equipamento')!!}
                            {!! Form::select('equipamento', array('','Celular' => 'Celular', 'Tablet' => 'Tablet'), null, ['class'=>'form-control','required']) !!}
                            <div class="help-block with-errors"></div>
                        </div>


                        <div class="form-group">
                        {!! Form::label('marca', 'Marca')!!}
                        {!! Form::select('marca', array('','Apple' => 'Apple', 'Asus' => 'Asus',
                                         'Blu' => 'Blu', 'CCE' => 'CCE', 'Motorola' => 'Motorola', 'Multilaser' => 'Multilaser',
                                         'Nokia' => 'Nokia', 'Samsung' => 'Samsung' , 'Genesis' => 'Genesis', 'QBEX' => 'QBEX',
                                         'XIAOMI' => 'XIAOMI'), null, ['class'=>'form-control', 'required']) !!}
                            <div class="help-block with-errors"></div>
                        </div>


                        <div class="form-group">
                        {!! Form::label('modelo', 'Modelo')!!}
                        {!! Form::input('text', 'modelo', null,['class' => 'form-control', 'required', 'placeholder' => 'Modelo do aparelho']) !!}
                            <div class="help-block with-errors"></div>
                        </div>


                        <div class="form-group">
                        {!! Form::label('imei', 'IMEI')!!}
                        {!! Form::input('string', 'imei', null,['class' => 'form-control', 'required', 'placeholder' => 'IMEI do aparelho']) !!}
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