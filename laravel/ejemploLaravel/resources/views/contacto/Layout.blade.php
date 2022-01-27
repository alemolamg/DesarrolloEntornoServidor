<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laravel - @yield('tituloPag')</title>
</head>
<body>
@section('header')
    MASTER HEADER
@show
<div class="content">
    @yield('content')
</div>
@section('footer')
    MASTER FOOTER
@show
</body>
</html>
