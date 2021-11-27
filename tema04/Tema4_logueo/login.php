<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("method/referencias.php"); ?>
    <title>Iniciar Sesión</title>
</head>

<body>
    <?php
    require_once("controllers/funciones.php");
    $error = false;
    if (isset($_POST['entrar'])) {
        $dwes = crearConexion();

        if (isset($_POST['pass'])) {
            $pass = md5($_POST['pass']);

            $consulta = "SELECT * FROM empleados emp WHERE user = '$_POST[user]' AND pass = '$pass'";
            $user = $dwes->query($consulta);

            if ($user->rowCount()) {
                $_SESSION['user'] = $_POST['user'];
                $_SESSION['pass'] = $_POST['pass'];
                header('Location: index.php');
            } else {
                $error = true;
            }
        } else {
            echo "da error";
        }
    }
    if (isset($_POST['registro'])) {
        header('Location: registro.php');
    }
    ?>

    <h1 class="text-center p-3 text-white bg-success">Iniciar Sesión</h1>
    <div class="container card py-2">
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3 mt-3">
                    <label for="user" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="user" placeholder="Nombre de usuario" name="user" value="<?php if (isset($_SESSION['user'])) echo $_SESSION['user']; ?>">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="pass" placeholder="Introduce la contraseña" name="pass" value="<?php if (isset($_SESSION['pass'])) echo $_SESSION['pass']; ?>">
                </div>

                <button type="submit" name="entrar" class="btn btn-success">Entrar</button>
                <button type="submit" name="registro" class="btn btn-success">Registrarse</button>
                <?php if ($error) {
                    echo "<h3 class='error pt-3' style='color:red'>ERROR. USUARIO O CONTRASEÑA INCORRECTA.</h3>";
                } ?>
            </form>
        </div>
    </div>

</body>

</html>