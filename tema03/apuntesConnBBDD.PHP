<?php

/* Método procedimental

$dwes2 = @mysqli_connect('localhost', 'dwes', 'abc123.', 'dwes'); //esto devuelve un identificador de la conexión, no un objeto como el ejemplo anterior
//echo mysqli_get_server_info($dwes2);//aquí le pasamos a la función el identificador de la conexión
*/

/* Método orientado a objetos */
//para quitar warnings de php ponemos delante de la función una @
$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes'); //servidor, usuario, contraseña, bbdd
echo $dwes->server_info . '<br>';

//Si en la conexión no se establece la bbdd podemos usar select_db
$dwes -> select_db('dwes');


/* CONTROLAR ERRORES */
if($dwes -> connect_errno){
    //función para detener ejecución del script (die o exit)
    die ('ERROR ' . $dwes -> connect_error);
    //exit;
}

//También hay que tener en cuenta la codificación de los caracteres
$dwes ->set_charset('utf8mb4');//para que reconozca también los caracteres de los emoticonos


/* CONSULTAS 
if($dwes ->query('UPDATE stock SET unidades=10 WHERE producto="EEEPC1005PXD"')){//consulta con comillas simples
    echo 'Líneas modificadas ' . $dwes -> affected_rows;
} else {
    //los errores se almacenan en los atributor errno y error, ahí se encuentra el error de la última instrucción
    echo $dwes -> error;
}*/

// RECOGER RESULTADOS
$resultado = $dwes ->query('select * from producto');
if (!$dwes -> errno){
    echo $resultado -> num_rows . '<br>';
    $busqueda = $resultado->fetch_object(); //descargamos los datos de una fila en stock
    while ($busqueda != null) { //funciona igual que los cursores en mysql, bucle hasta llegar a última fila
    //print "<p>Producto $stock->producto: $stock->unidades unidades.</p>";

        echo '<br>Código ' . $busqueda -> cod . '<br>';
        echo 'Nombre ' . $busqueda -> nombre_corto . '<br>';
        echo 'Precio ' . $busqueda -> PVP . '<br><br><hr>';
    $busqueda = $resultado->fetch_object();
}
}

//Para hacer consulta de fila en fila, en lugar de todo de golpe como en el caso anterior
$resultado = $dwes ->query('select * from producto', MYSQLI_USE_RESULT);

//Es importante cerrar las conexiones antes de que acabe el script
$dwes -> close();

