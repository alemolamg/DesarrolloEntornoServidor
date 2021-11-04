<form action="" method="POST">
    Nombre:     <input type="text" name="nombre"><br>
    Apellidos:  <input type="text" name="apell"><br>
    Idiomas:    <select name="idiomas[]" multiple="true">
                    <option value="1">Castellano</option><br>
                    <option value="2">Francés</option><br>
                    <option value="4">Inglés</option><br>
                    <option value="8">Alemán</option><br>
                    <option value="16">Búlgaro</option><br>
                    <option value="32">Chino</option><br>
                </select><br>
                <!--<option value="Castellano">Castellano</option><br>
                    <option value="Francés">Francés</option><br>
                    <option value="Inglés">Inglés</option><br>
                    <option value="Alemán">Alemán</option><br>
                    <option value="Búlgaro">Búlgaro</option><br>
                    <option value="Chino">Chino</option><br>
                </select><br> -->
    <input type="submit" name="guardar" value="Guardar">
    <input type="submit" name="recup" value="Recuperar">
    
</form>

<?php

if(isset($_POST['guardar'])){
    $dwes = new mysqli('localhost','dwes','abc123.','prueba');
    if ($dwes->connect_errno){     //Entra si hay hay errores
        //$mensaje = $dwes->connect_errno."-".$dwes->connect_error;
        $error = $dwes->connect_errno;
        die( "ERROR AL CONECTAR CON EL SERVIDOR DE BD");
    }
    $error = $dwes->connect_errno;
    $mensaje = "No hay errores";
    
    $suma = 0;
    foreach ($_POST['idiomas'] as $value) {
       $suma += $value;
    }
    
    /* $idiomas = implode(",", $_POST['idiomas']);*/
    
    $dwes->query("INSERT INTO alumnos (Nombre,Apellidos,Idiomas) VALUES ('$_POST[nombre]','$_POST[apell]','$suma')");
    if($dwes->errno)
        echo $dwes->error."<br>";
    if($dwes->affected_rows>0)
        echo "Registro Insertado correctamente"."<br>";
    else
        echo "¡¡¡ERROR!!! REGISTRO NO INSERTADO <br>";

}

if(isset($_POST['recup'])){
    $dwes = new mysqli('localhost','dwes','abc123.','prueba');
    if ($dwes->connect_errno){     //Entra si hay hay errores
        //$mensaje = $dwes->connect_errno."-".$dwes->connect_error;
        $error = $dwes->connect_errno;
        die( "ERROR AL CONECTAR CON EL SERVIDOR DE BD");
    }
    $error = $dwes->connect_errno;
    $mensaje = "No hay errores";
    
    $result = $dwes->query("SELECT * FROM alumnos");
    if($dwes->errno)
        die ($dwes->error);
    
    while($fila = $result->fetch_object()){
        echo "ID Alumno: ".$fila->id."<br>";
        echo "Nombre: ".$fila->Nombre."<br>";
        echo "Apellidos: ".$fila->Apellidos."<br>";
        echo "Idiomas: ";
        $idiom = explode(',', $fila->Idiomas);
        foreach ($idiom as $idi) {
            echo $idi."<br>";
        }
        echo "<br> ----------------------------- <br>"; 
    }

}
        
?>