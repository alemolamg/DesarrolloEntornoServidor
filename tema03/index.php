<?php
    /* Conexión por métodos procedimentales */
//    $dwes = mysqli_connect('localhost','dwes','abc123.','dwes');
//    echo mysqli_get_server_info($dwes);

/* Conexión por clases  */
    $dwes = new mysqli('localhost','dwes','abc123.','dwes'); //Está mal a propósito
    if (!$dwes->connect_errno){     //Entra si no hay errores
            echo $dwes->server_info;
            echo '<br>';
    } else {
        echo $dwes->connect_errno."-".$dwes->connect_error;
    }

    // RECOGER RESULTADOS
    $resultado = $dwes ->query('select * from producto');
    if (!$dwes -> errno){
        echo $resultado -> num_rows . '<br>';
        $stock = $resultado->fetch_object(); //descargamos los datos de una fila en stock
        while ($stock != null) { //funciona igual que los cursores en mysql, bucle hasta llegar a última fila
            //print "<p>Producto $stock->producto: $stock->unidades unidades.</p>";
            echo '<br>Código ' . $stock -> cod . '<br>';
            echo 'Nombre ' . $stock -> nombre_corto . '<br>';
            echo 'Precio ' . $stock -> PVP . '<br><br><hr>';
            $stock = $resultado->fetch_object();
        }
    }

?>

