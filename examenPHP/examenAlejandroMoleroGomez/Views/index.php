<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("../Models/referencias.php"); ?>
    <title>Iniciar Sesión</title>
</head>

<body>
    <?php
    require_once("../Controllers/Conexion.php");
    $error = false;
    if (isset($_POST['entrar'])) {
        $dwes = new Conexion();

        if (isset($_POST['pass'])) {
            $pass = md5($_POST['pass']); // Transformo la contraseña a MD5

            $consulta = "SELECT * FROM responsable WHERE dni = '$_POST[dni]' AND pass = '$pass'";
            $user = $dwes->query($consulta);
            if ($user->rowCount()) {
                $fila = $user->fetch();
                $_SESSION['dni'] = $_POST['dni'];
                $_SESSION['pass'] = $_POST['pass'];
                $_SESSION["usuNombre"] = $fila->nombre;


                //setcookie("contrasenia", $_POST['pass'], time() + 3600);
                //setcookie("recordar", $_POST['remember'], time() + 3600);
                header('Location: inicio_responsable.php');
            } else {
                /*if ($fila->intentos <= 0) {
                    setcookie("bloqueo", $_POST['user'], time() + 30);
                    setcookie("intentos", $fila->intentos - 1);
                }*/
                $error = true;
            }
        } else {
            echo "da error";
        }
    }
    ?>

    <h1 class="text-center p-3 text-white bg-success">Iniciar Sesión</h1>
    <div class="container card py-2">
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3 mt-3">
                    <label for="dni" class="form-label">DNI:</label>
                    <input type="text" class="form-control" id="dni" placeholder="DNI de usuario" name="dni" value="<?php if (isset($_SESSION['dni'])) echo $_SESSION['dni']; ?>">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="pass" placeholder="Introduce la contraseña" name="pass" value="<?php if (isset($_SESSION['pass'])) echo $_SESSION['pass']; ?>">
                </div>

                <button type="submit" name="entrar" class="btn btn-success">Entrar</button>
                <?php
                if ($error) {
                    echo "<h3 class='error pt-3' style='color:red'>ERROR. USUARIO O CONTRASEÑA INCORRECTA.</h3>";
                    //echo "<h3  class='error pt-3' style='color:red'> Número de intentos restantes:" . $_COOKIE['intentos']  . "</h3>";
                }
                ?>
            </form>
        </div>
    </div>

</body>

</html>