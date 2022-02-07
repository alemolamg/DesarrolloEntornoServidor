<div>
    <h1>Listado de Frutas</h1>
    <!-- Maneras de pasar desde una ruta a otra -->
    <a href="{{route('peras')}}">Ir a Peras ('con route')</a>
    <br>
    <a href="{{route('naranjas')}}">Ir a naranjas ('con route')</a>
    <br>
    <a href="{{url('/naranjas/7')}}">Ir a naranjas ('con url')</a>
    <br>
    <a href="{{action([App\Http\Controllers\FrutasController::class,'naranjas'])}}">Ir a naranjas ('con action')</a>
    <br>

    <!-- Lista de frutas -->
    <ul>
        @foreach($frutas as $fruta)
            <li>{{$fruta}}</li>
        @endforeach
    </ul>
</div>

<div id="formulario">
    @if(session('status'))
        {{session('status')}}
    @endif
    <form action="" method="post">
        @csrf
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" value="{{old('nombre')}}">
            @if($errors->has('nombre'))
                {{$errors->first('nombre')}}
            @endif
        </p>
        <p>
            <label for="descrip">Descripción: </label>
            <input type="textarea" name="descrip" value="{{old('descrip')}}">
            @error('descrip')
            {{$message}}
            @enderror
        </p>
        <input type="submit" value="Enviar">

    </form>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
</div>


