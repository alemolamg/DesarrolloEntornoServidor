<h2 class="text-xl">Lista de frutas en la base de datos</h2>
@foreach($frutas as $f)
    {{$f->nombre_fruta}}<br>
@endforeach
