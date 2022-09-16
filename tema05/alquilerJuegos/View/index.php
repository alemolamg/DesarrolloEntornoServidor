<?php
session_start();
//echo session_status();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    //echo 'No existe $_session[user]';
}
require_once '../Controllers/JuegoController.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once '../method/referencias.php';  ?>
    <title>Alquiler de Juegos</title>
</head>

<body style="background-color: transparent" >
    <?php require_once('../method/navbar.php'); ?>

    <div id="ListaJuegos" class="container-fluid mt-5 p-0 pb-5 p-lg-4">
        <h2>Usuario: <?php echo $_SESSION['user']; ?></h2> <!<!-- Muestra el dni del usuario -->
        <div id="filaJuegos" class="row justify-content-center bg-warning mx-1">
            <?php
            JuegoController::mostrarJuegosPantalla();
            ?>
        </div>
    </div>
</body>

</html>