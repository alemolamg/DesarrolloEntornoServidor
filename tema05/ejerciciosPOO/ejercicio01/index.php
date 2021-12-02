<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "./method/referencias.php"; ?>
    <?php
    require_once "Animal.php";
    require_once "Mamifero.php";
    require_once "Gato.php";
    require_once "Ave.php";
    require_once "Lagarto.php";
    require_once "Perro.php";
    require_once "Pinguino.php";
    require_once "Canario.php";
    $animales = array(
        'Perro' => new Perro("Tobi", 5, "#753406", "Perro", 4, "Carnívoro"),
        'Canario' => new Canario("Perico", 2, "#ede96b", 2, 'omnívoro'),
        'Aguila' => new Ave("Rigoberto", 'Águila', "Carnívoro", "https://misanimales.com/wp-content/uploads/2020/07/aguila-calva-caza-1024x745.jpg")
    );

    if (isset($_POST['audio'])) {
        if (isset($_POST['Mamifero'])) {
            echo "<audio src='$_POST[audio]'></audio>";
        }
    }

    ?>
    <title>Lista animales</title>
</head>

<body>
    <h1>Lista de animales</h1>

    <table class="table table-striped">
        <?php
        foreach ($animales as $key => $animal) {
        ?>
            <tr>
                <td>
                    <h2><?php echo $animal->__get('nombre'); ?></h2> <br>
                    <?php echo $animal->__get("especie");  ?>
                </td>
                <td><img src="<?php echo $animal->getImagen();  ?>" height="150px"></td>
                <td>
                    <h3>Funciones:</h3>
                    <?php $animal->darFunciones(); ?>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>

</body>

</html>