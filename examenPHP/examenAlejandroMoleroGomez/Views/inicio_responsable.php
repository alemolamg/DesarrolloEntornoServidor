<?php
session_start();
//echo session_status();
if (!isset($_SESSION['dni'])) {
    header('Location: index.php');
    //echo 'No existe $_session[user]';
}
require_once '../Controllers/AnimalController.php';
require_once '../Controllers/JaulaController.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "../Models/referencias.php";  ?>
    <title>Inicio Responsable - Zoo</title>
</head>

<body>
    <div id="principal">
        <?php require_once '../Models/navbar.php'; //Especie de barra de navegación  ?>

        <div id="listaAnimales" class="container-fluid ">
            <div class="row mx-1">
                <?php AnimalController::mostrarTablaAnimales();  ?>

            </div>
        </div>
    </div>

    <div class="row mx-1">
    <?php
    if (isset($_POST['verHistorial'])) {
        echo "<h1>Historial Jaulas de ". $_POST["tipoAnimal"]  ."</h1>";
        
        if (isset($_POST["codAnimal"])) {
            JaulaController::cargarHistorial($_POST["codAnimal"]);
        } else {
            echo "Error al coger código animal";
        }
    }
    ?>
    </div>

</body>

</html>