<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Objetos + Base Datos</title>
</head>

<body>
    <h1>Titulo inicial</h1>
    <?php
    require_once 'Producto.php';
    $p = new Producto();
    $p->nuevoP(4, "mochila", 12);
    $error = $p->insertar();
    if ($error) {
        //echo $error;
        if ($error == 1062){
            echo " El producto ya existe en la base de datos, inserta otro.";
        }
    } else {
        echo 'Producto insertado correctamente.';
    }

    ?>




</body>

</html>