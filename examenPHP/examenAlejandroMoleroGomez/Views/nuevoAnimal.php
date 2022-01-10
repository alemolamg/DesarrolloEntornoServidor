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

    <?php
    if (isset($_POST['aniadir'])) {

        if (isset($_POST['jaula']) && isset($_POST['conti']) && isset($_POST['pais']) && isset($_POST['anioNac']) && isset($_POST['sexo']) && isset($_POST['especie']) && isset($_POST['tipo']) && isset($_POST['cod'])) {
            echo "Entro correctamente";

            echo $_FILES['imagen']['name'];
            AnimalController::aniadirAnimal($_POST['cod'], $_POST['tipo'], $_POST['especie'], $_POST['sexo'], $_POST['anioNac'], $_POST['pais'], $_POST['conti'], $_FILES['imagen']['name'], $_POST['jaula']);
        } else {
            echo "<h2>Error, los datos no están completos</h2>";
        }
    }

    ?>

    <div id="navbar">
        <?php require_once '../Models/navbar.php'; //Especie de barra de navegación  
        ?>
    </div>

    <div id="formulario">
        <div class="container card py-2 my-3">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- Codigo -->
                    <div class="mb-3 mt-3">
                        <label for="cod" class="form-label">Codigo:</label>
                        <input type="text" class="form-control" id="codigo" placeholder="Codigo Animal" name="codigo" value="<?php if (isset($_POST['codigo'])) echo $_POST['codigo']; ?>">
                    </div>

                    <!-- Tipo -->
                    <div class="mb-3 mt-3">
                        <label for="tipo" class="form-label">Tipo:</label>
                        <input type="text" class="form-control" id="tipo" placeholder="Tipo Animal" name="tipo" value="<?php if (isset($_POST['tipo'])) echo $_POST['tipo']; ?>">
                    </div>

                    <!-- Especie -->
                    <div class="mb-3 mt-3">
                        <label for="especie" class="form-label">Codigo:</label>
                        <input type="text" class="form-control" id="especie" placeholder="Especie Animal" name="especie" value="<?php if (isset($_POST['especie'])) echo $_POST['especie']; ?>">
                    </div>

                    <!-- Sexo -->
                    <div class="mb-3 mt-3">
                        <label for="sexo" class="form-label">Sexo:</label>
                        <input type="radio" class="form-check-input ms-1" name="sexo" id="hembra" value="hembra"><label class="form-check-label ms-1" for="hembra"> Hembra </label>
                        <input type="radio" class="form-check-input ms-3" name="sexo" id="macho" value="macho"><label class="form-check-label ms-1" for="macho"> Macho </label>
                    </div>

                    <!-- Año nacimiento -->
                    <div class="mb-3 mt-3">
                        <label for="anioNac" class="form-label">Año de Nacimiento:</label>
                        <input type="date" class="form-control" id="anioNac" placeholder="Nacimineto Animal" name="anioNac" value="<?php if (isset($_POST['anioNac'])) echo $_POST['anioNac']; ?>">
                    </div>

                    <!-- Pais -->
                    <div class="mb-3 mt-3">
                        <label for="pais" class="form-label">País:</label>
                        <input type="text" class="form-control" id="pais" placeholder="Pais Animal" name="pais" value="<?php if (isset($_POST['pais'])) echo $_POST['pais']; ?>">
                    </div>

                    <!-- Continente -->
                    <div class="mb-3 mt-3">
                        <label for="conti" class="form-label">Continente:</label>
                        <input type="text" class="form-control" id="conti" placeholder="Continente Animal" name="conti" value="<?php if (isset($_POST['conti'])) echo $_POST['conti']; ?>">
                    </div>

                    <!-- Imagen -->
                    <div class="mb-3 mt-3">
                        <label for="imagen" class="form-label">Imagen:</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="jpg jpeg">
                    </div>

                    <!-- Jaula -->
                    <div class="mb-3 mt-3">
                        <label for="jaula" class="form-label">Continente:</label>
                        <select name="jaula" id="jaula">
                            <?php
                            $listaJaulas = JaulaController::allJaulas();
                            foreach ($listaJaulas as $jaula) {
                                echo "<option value='" . $jaula->getCodigo()  . "'>" . $jaula->getCaracteristicas() . " - " . $jaula->getUbicacion() . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="aniadir" class="btn btn-success">Añadir animal</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>