<!-- Define las variables que se usarán con un valor por defecto por si no se pasa
    De esta manera impide tener errores por no pasar parámetros. -->
@props(['tipo'=>"warning"])

<div class="alert alert-{{$tipo}}" role="alert">
    {{$slot}}
</div>
