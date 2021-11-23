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

            $consulta = "SELECT * FROM empleados emp WHERE user = '$_POST[usuario]' AND pass = '$pass'";
            $user = $dwes->query($consulta);

            if ($user->rowCount()) {
                session_start();
                $_SESSION['usuario'] = $_POST['usuario'];
                $_SESSION['conex'] = $dwes;
                $_SESSION['pass'] = $_POST['pass'];
                setcookie("usuario", $_POST['usuario'], time() + 3600);
                setcookie("contrasenia", $_POST['pass'], time() + 3600);
                //setcookie("recordar", $_POST['remember'], time() + 3600);
                header('Location: index.php');
            } else {
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
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" placeholder="Nombre de usuario" name="usuario" value="<?php if (isset($_SESSION['usuario'])) echo $_SESSION['usuario']; ?>">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="pass" placeholder="Introduce la contraseña" name="pass" value="<?php if (isset($_SESSION['pass'])) echo $_SESSION['pass']; ?>">
                </div>
                <!--<div class="form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" value="<?php //if (isset($_POST['remember'])) echo 'checked'; 
                                                                                                ?>"> Recuerdame
                    </label>
                </div> -->

                <button type="submit" name="entrar" class="btn btn-success">Entrar</button>
                <?php if ($error) {
                    echo "<h3 class='error pt-3' style='color:red'>ERROR. USUARIO O CONTRASEÑA INCORRECTA.</h3>";
                } ?>
            </form>
        </div>
    </div>

</body>

</html>