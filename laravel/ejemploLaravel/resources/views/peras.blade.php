<h2 class="text-xl">Lista de frutas en la base de datos</h2>
@foreach($frutas as $f)
    Nombre: {{$f->nombre_fruta}} - Temporada: {{$f->temporada}} - Pais: {{$f->pais}}<br>
@endforeach
