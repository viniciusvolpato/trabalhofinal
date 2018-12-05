{{$texto}}

@if($checagem == true)
    Checagem = true
@else
    Checagem = false
@endif


<br/>


@foreach($usuarios as $usuario)
    {{$usuario}} <br/>
@endforeach

