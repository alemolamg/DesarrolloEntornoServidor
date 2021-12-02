<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "./method/referencias.php"; ?>
    <title>Lista animales</title>
</head>

<body>
    <h1>Lista de animales</h1>
    <?php
    require_once "Mamifero.php";
    require_once "Ave.php";
    require_once "lagarto.php";
    $imagen = 'https://estaticos.muyinteresante.es/media/cache/1000x_thumb/uploads/images/test/57fccea55bafe8b4058b4569/mamiferos2.jpg';

    $miAve = new Mamifero('Gallina', 2, 'herbívoras', true, $imagen);
    echo "<p> $miAve  </p>"
    ?>
    <img src="<?php echo $miAve->imagen;  ?>" height="200px">

    <?php
    $lagartija = new Lagarto("Lagartija", 7, "Reptil", 4, "Mosquitos");
    echo "<p> $lagartija  </p>"
    ?>
    <img src="<?php echo $lagartija->imagen;  ?>" height="200px">
</body>

</html>