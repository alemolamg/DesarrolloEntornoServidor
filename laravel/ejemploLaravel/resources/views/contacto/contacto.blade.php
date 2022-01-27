@include('contacto.cabecera',array('nombre'=>$nom))

<h2>Hola soy {{$nom}} y tengo {{$edad}}</h2>

@if($edad > 17)
    Eres mayor de edad
@else
    Eres menor de edad
@endif
<br>
<br> <h2>Lista de frutas:</h2>

@foreach($frutas as $fruit)
    {{$fruit}} <br>
@endforeach

@include('contacto.cabecera')
