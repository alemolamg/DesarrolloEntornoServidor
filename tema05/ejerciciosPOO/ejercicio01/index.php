<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "./method/referencias.php"; ?>
    <title>Animales</title>
</head>

<body>
    <h1>Lista de animales</h1>
    <?php
    require_once "mamifero.php";
    $mami = new mamifero('Gallina', 2, 'herbívoras', true);

    ?>
    <img src="<?php echo $mami->imagen;  ?>" height="200px">
</body>

</html>