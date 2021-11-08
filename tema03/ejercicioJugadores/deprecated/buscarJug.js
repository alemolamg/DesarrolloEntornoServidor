function mostrarEle() {
    var elegido = document.getElementById('elector').value;
    if (elegido == 1) {
        var codigo = '<form action="" method="POST">  DNI:<input type="text" name="dni"><br><button onclick="buscarJug($dwes)">Buscar por DNI</button></form>';
        document.getElementById("formulario").innerHTML = codigo;
    }

    if (elegido == 2) {
        var codigo = '<form action="" method="POST"> Equipo: <select name="equipo"> <option value="%" selected>Cualquiera</option> <?php calcEquipos($dwes) ?>  </select> <br> <button onclick="buscarJug($dwes)">Buscar por Equipo</button> </form>';
        document.getElementById("formulario").innerHTML = codigo;
    }

    if (elegido == 3) {
        var codigo = '<form action="" method="POST"> Posición: <select name="posicion"> <option value="*" selected>Cualquiera</option> <option value="Portero">Portero</option><br> <option value="Defensa">Defensa</option><br> <option value="Centrocampista">Centrocampista</option><br> <option value="Delantero">Delantero</option><br> </select><br> <button onclick="buscarJug($dwes)">Buscar por Posición</button> </form>';
        document.getElementById("formulario").innerHTML = codigo;
    }
}

mostrarConsola = (param) => {
    console.log(param);
}