@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/themes/default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/themes/default.date.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/themes/default.time.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.date.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.time.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/legacy.js"></script>

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Informe abaixo as informações das ordens de serviço
                        <a class="pull-right" href="{{ url('compras') }}">Listagem de ordens de serviço</a>
                    </div>

                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                        @endif

                        @if(Request::is('*/editar'))
                            {!! Form::model($compra, ['method' => 'PATCH',  'id' => 'validation', 'role' => 'form',
                            'data-toggle' => 'validator', 'url' => 'compras/'.$compra->id]) !!}
                        @else
                                {!! Form::open(['url' => 'compras/salvar', 'id' => 'validation', 'role' => 'form',
                                    'data-toggle' => 'validator']) !!}
                        @endif

                            {!! Form::open(['url' => 'compras/salvar']) !!}

                            <div class="form-group">
                            {!! Form::label('tecnico', 'Técnico')!!}
                            {!! Form::select('tecnico', array('' => '', 'Eduardo' => 'Eduardo', 'Vinicius' => 'Vinicius', 'Guilherme' => 'Guilherme',
                                            'Ronei' => 'Ronei' ), null, ['class'=>'form-control','required']) !!}
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group">
                            {!! Form::label('datai', 'Data de Entrada')!!}
                            {!! Form::input('date', 'datai', null, ['class' => 'form-control dob', 'required','placeholder' => 'Data de entrada do aparelho']) !!}
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group">
                            {!! Form::label('problema', 'Defeito do Aparelho')!!}
                            {!! Form::select('problema', array('' =>'', 'Touch trincado' => 'Touch trincado', 'Display quebrado' => 'Display quebrado',
                                            'Conector de carga' => 'Conector de carga', 'Chave lig/desl' => 'Chave lig/desl','Botão home' => 'Botão home',
                                            'Aparelho molhado' => 'Aparelho molhado', 'Placa em curto' => 'Placa em curto', 'Tela Branca' => 'Tela Branca',
                                            'Software corrompido' => 'Software corrompido' ), null, ['class'=>'form-control', 'required']) !!}
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group">
                            {!! Form::label('servex', 'Serviço Executado')!!}
                            {!! Form::select('servex', array('' =>'', 'Troca do touch' => 'Troca do touch', 'Troca do display' => 'Troca do display',
                                            'Troca do conector de carga' => 'Troca do conector de carga', 'Troca da chave lig/desl' => 'Troca da chave lig/desl','Troca do botão home' => 'Troca do botão home',
                                            'Desoxidação e ressolda na placa' => 'Desoxidação e ressolda na placa', 'Conserto da placa' => 'Conserto da Placa', 'Nenhum' => 'Nenhum',
                                            'Reinstalação do software' => 'Reinstalação do software' ), null, ['class'=>'form-control', 'required']) !!}
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group">
                            {!! Form::label('situacao', 'Situação')!!}
                            {!! Form::select('situacao', array('' => '', 'Aparelho esperando para ser consertado' => 'Aparelho esperando para ser consertado',
                                             'Aparelho em conserto' => 'Aparelho em conserto',
                                             'Aparelho consertado' => 'Aparelho consertado',
                                             'Aparelho sem conserto' => 'Aparelho sem conserto',
                                             'Aparelho aguardando para retirada' => 'Aparelho aguardando para retirada',
                                             'Aparelho entregue ao cliente' =>  'Aparelho entregue ao cliente') ,
                                              null, ['class'=>'form-control', 'required']) !!}
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group">
                            {!! Form::label('valor', 'Valor')!!}
                            {!! Form::input('string', 'valor', null,['class' => 'form-control', '', 'required', 'placeholder' => 'Valor do conserto']) !!}
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group">
                            {!! Form::label('datae', 'Data de Saída')!!}
                            {!! Form::input('date', 'datae', null, ['class' => 'form-control dob', 'placeholder' => 'Data de entrada do aparelho']) !!}
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group">
                            {!! Form::label('id_cliente', 'Cliente')!!}
                            {{ Form::select('id_cliente',\App\Cliente::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control',]) }}
                                <div class="help-block with-errors"></div>
                            </div>


                            <?php $produtos = [];


                            foreach (\App\Produto::orderBy('equipamento')->get()->toArray() as $produto){
                                $produtos[$produto['id']] = $produto['equipamento'].' - '.$produto['marca'].' - '.$produto['modelo'];
                            }
                            ?>
                            <div class="form-group">
                            {!! Form::label('id_equipamento', 'Equipamento')!!}
                            {{ Form::select('id_equipamento',$produtos, null, ['class'=>'form-control',]) }}
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
        $(document).ready(function() {
            $('.dob').pickadate({
                format: 'dd/mm/yyyy',
                formatSubmit: 'yyyy-mm-dd',
                hiddenName: true
            });

            $('#validation').validator();
        });
    </script>
@endsection