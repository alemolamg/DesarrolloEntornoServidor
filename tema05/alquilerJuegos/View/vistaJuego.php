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

<body style="background-color: transparent">
    <?php require_once('../method/navbar.php');
    JuegoController::recuperarJuego('hola'); //Debería funcionar
    ?>

    <div id="Juego">
        <div class="row">
            <div class="col">
                <div id="img">
                    <img class="card-img-top img-fluid m-1" src="../<?php echo $juego->getImagen(); ?>" style="max-height: 220px; width: auto;" alt="Card image">
                </div>
            </div>
            <div class="col">
                <div id="img"></div>
            </div>
        </div>
    </div>


    <div id="ListaJuegos" class="container-fluid mt-5 p-0 pb-5 p-lg-4">
        <div id="filaJuegos" class="row justify-content-center">
            <?php
            JuegoController::mostrarJuegosPantalla();
            ?>
        </div>
    </div>
</body>

</html>