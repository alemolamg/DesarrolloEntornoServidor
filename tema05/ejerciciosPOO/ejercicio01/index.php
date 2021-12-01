<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "./method/referencias.php"; ?>
    <title>Lista animales</title>
</head>

<body>
    <h1>Lista de animales</h1>
    <?php
    require_once "mamifero.php";
    require_once "Ave.php";
    $imagen = 'https://estaticos.muyinteresante.es/media/cache/1000x_thumb/uploads/images/test/57fccea55bafe8b4058b4569/mamiferos2.jpg';

    $mami = new Ave('Gallina', 2, 'herbívoras', true, $imagen);
    echo "<p> $mami  </p>"
    ?>
    <img src="<?php echo $mami->imagen;  ?>" height="200px">
</body>

</html>