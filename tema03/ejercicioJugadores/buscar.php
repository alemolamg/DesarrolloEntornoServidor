<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar</title>
</head>

<body>
    <h2>Buscar Jugadores</h2>
    <form action="" method="POST">
        <?php if (!isset($_POST['busquedaAvan'])) {
            echo '<input type="hidden" name="busquedaAvan" id="busquedaAvan">';
        }
        ?>
        <input type="button" value="Volver" onclick="location.href='./index.php'">
        <input type="submit" value="Cambiar tipo Búsqueda"><br>
    </form>

    <?php
    if (isset($_POST["busquedaAvan"])) {
        include("buscarAdvJug.php");
    } else
        include("buscarJug.php");
    ?>
</body>

</html>