
<?php
print "<h2>Ejemplo productos: </h2><br>";
otroEjemplo();
//cambiarTiendas();

/*$nfa = $dwes->exec("UPDATE stock SET unidades=4550 WHERE producto='ACERAX3950'");
echo $dwes->errorCode();
print_r($dwes->errorInfo());
if ($nfa === 0) {
    echo "<br>funciona, se han cambiado $nfa filas";
}*/


function cambiarTiendas()
{
    $dwes = new PDO('mysql:host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.');
    // Ejercicio Ejemplo
    $ok = true; //Variable de que todo funciona
    /* Preparamos las consultas */
    $updT1 = "UPDATE stock SET unidades=1 WHERE producto='PAPYRE62GB' AND tienda=1;";
    $aniaT2 = "INSERT INTO stock (producto,tienda,unidades) VALUES ('PAPYRE62GB',2,1);";

    if ($dwes->exec($updT1) == 0) {
        $ok = false;
    }
    if ($dwes->exec($aniaT2) == 0) {
        $ok = false;
    }

    if ($ok) {
        $dwes->commit();
    } else {
        echo $dwes->errorInfo();
        $dwes->rollBack();
    }
}

function otroEjemplo()
{
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
    $dwes = new PDO('mysql:host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.', $options);

    $result = $dwes->query("SELECT * FROM producto ORDER BY nombre_corto");
    if ($dwes->errorCode() != 0) {
        print_r($dwes->errorInfo());
        die("ERROR");
    }
    while ($fila = $result->fetch()) {
        echo 'Nombre: ' . $fila->nombre_corto . '<br>';
        //echo "Descripción: $fila->descripcion <br>";
        echo "Precio: $fila->PVP <br>";
        echo "Familia: $fila->familia <br>";
        echo "<br> -------------------- <br>";
    }
}


?>