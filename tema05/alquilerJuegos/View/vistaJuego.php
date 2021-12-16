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
    $juego = JuegoController::recuperarJuego($_POST['codJuego']); //Debería funcionar
    ?>

    <div id="Juego" class="mt-5">
        <div class="row flex-wrap">
            <div class="mt-2 col-lg-4">
                <div id="img" class="d-flex justify-content-center">
                    <img class="img-fluid m-1" src="../<?php echo $juego->getImagen(); ?>" style="max-height: 420px; width: auto;" alt="Card image">
                </div>
            </div>
            <div class="mt-2 col-lg">
                <h1><?php echo $juego->getNombreJuego();  ?> - <?php echo $juego->getNombreConsola(); ?></h1>
                <p>Año Lanzamiento: <?php echo $juego->getAnno();  ?></p>
                <h2>Descripción</h2>
                <p class="text-justify">Esto es la descripcion del juego. <?php echo $juego->getDescrip();  ?></p>
            <!-- </div>
            <div class="mt-2 col-lg-3"> -->
                <h2>Precio: <?php echo $juego->getPrecio(); ?>€ </h2>
                <p>está alquilado el juego ? <?php echo $juego->getAlquilado(); ?> --BORRAME LUEGO</p>
                <?php if($juego->getAlquilado() == false){ ?>
                <input type="submit" value="alquilado" name="alquilado" class="btn btn-danger" /> 
                <?php } else { ?>
                <input type="submit" value="Alquilar" class="btn btn-primary">
                <?php } ?>
            </div>
        </div>
    </div>


    <div id="ListaJuegos" class="container-fluid mt-5 p-0 pb-5 p-lg-4">
        <div id="filaJuegos" class="row justify-content-center">
            <?php
            //JuegoController::mostrarJuegosPantalla();
            ?>
        </div>
    </div>
</body>

</html>