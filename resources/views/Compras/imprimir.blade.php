<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="C:\Users\vinicius\trabalho\resources\assets\css\app.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Trabalho Final
            </a>
        </div>
    </div>
</nav>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/themes/default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/themes/default.date.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/themes/default.time.css">

    <script src ="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.js"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.date.js"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/picker.time.js"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.3/legacy.js"></script>

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Detalhes da Ordem de Serviço
                    </div>

                    <div class="panel-body">

                        {!! Form::model($compra, ['method' => 'PATCH', 'url' => 'compras/'.$compra->id]) !!}

                        {!! Form::open(['url' => 'compras/salvar']) !!}

                        {!! Form::label('tecnico', 'Técnico')!!}
                        {!! Form::select('tecnico', array('' => '', 'Ronei' => 'Roeni', 'Vinicius' => 'Vinicius', 'Guilherme' => 'Guilherme',
                                        'Eduardo' => 'Eduardo' ), null, ['class'=>'form-control']) !!}



                        {!! Form::label('datai', 'Data de Entrada')!!}
                        {!! Form::input('date', 'datai', null,['class' => 'form-control', '', 'placeholder' => 'Data de entrada do material']) !!}







                        {!! Form::label('problema', 'Defeito do Aparelho')!!}
                        {!! Form::select('problema', array('' =>'', 'Touch trincado' => 'Touch trincado', 'Display quebrado' => 'Display quebrado',
                                        'Conector de carga' => 'Conector de carga', 'Chave lig/desl' => 'Chave lig/desl','Botão home' => 'Botão home',
                                        'Aparelho molhado' => 'Aparelho molhado', 'Placa em curto' => 'Placa em curto',
                                        'Software corrompido' => 'Software corrompido' ), null, ['class'=>'form-control']) !!}


                        {!! Form::label('servex', 'Serviço Executado')!!}
                        {!! Form::select('servex', array('' =>'', 'Troca do touch' => 'Troca do touch', 'Troca do display' => 'Troca do display',
                                        'Troca do conector de carga' => 'Troca do conector de carga', 'Troca da chave lig/desl' => 'Troca da chave lig/desl','Troca do botão home' => 'Troca do botão home',
                                        'Desoxidação e ressolda na placa' => 'Desoxidação e ressolda na placa', 'Conserto da placa' => 'Conserto da Placa',
                                        'Reinstalação do software' => 'Reinstalação do software' ), null, ['class'=>'form-control']) !!}

                        {!! Form::label('situacao', 'Situação')!!}
                        {!! Form::select('situacao', array('' => '', 'Aparelho esperando para ser consertado' => 'Aparelho esperando para ser consertado',
                                         'Aparelho em conserto' => 'Aparelho em conserto',
                                         'Aparelho aguardando peça' => 'Aparelho aguardando peça',
                                         'Aparelho consertado' => 'Aparelho consertado',
                                         'Aparelho sem conserto' => 'Aparelho sem conserto',
                                         'Aparelho aguardando para retirada' => 'Aparelho aguardando para retirada',
                                         'Aparelho entregue ao cliente' =>  'Aparelho entregue ao cliente') ,
                                          null, ['class'=>'form-control']) !!}


                        {!! Form::label('valor', 'Valor')!!}
                        {!! Form::input('double', 'valor', null,['class' => 'form-control', '', 'placeholder' => 'Valor do conserto']) !!}


                        {!! Form::label('datae', 'Data de Saída')!!}
                        {!! Form::input('date', 'datae', null,['class' => 'form-control', '', 'placeholder' => 'Data de saída do aparelho']) !!}


                        {!! Form::label('id_cliente', 'Cliente')!!}
                        {{ Form::select('id_cliente',\App\Cliente::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control',]) }}

                        <?php $produtos = [];

                        foreach (\App\Produto::orderBy('equipamento')->get()->toArray() as $produto){
                            $produtos[$produto['id']] = $produto['equipamento'].' - '.$produto['marca'].' - '.$produto['modelo'];
                        }
                        ?>

                        {!! Form::label('id_equipamento', 'Equipamento')!!}
                        {{ Form::select('id_equipamento',$produtos, null, ['class'=>'form-control',]) }}


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>