<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.5">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Iniciar Sesión</title>
</head>

<body>
    <?php
    $error = false;
    if (isset($_POST['entrar'])) {
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
        $dwes = new PDO('mysql:host=localhost; dbname=oficina; charset=utf8mb4', 'dwes', 'abc123.', $options);

        //echo "<h1>me quedo fuera </h1>";
        if (isset($_POST['pass'])) {
            //echo "entro en la contraseña";
            $pass = md5($_POST['pass']);

            $consulta = "SELECT * FROM empleados emp WHERE user = '$_POST[usuario]' AND pass = '$pass'";
            $user = $dwes->query($consulta);

            if ($user->rowCount()) {

                if (isset($_POST['remember'])) {
                    setcookie("usuario", $_POST['usuario'], time() + 3600);
                    setcookie("contrasenia", $_POST['pass'], time() + 3600);
                    setcookie("recordar", $_POST['remember'], time() + 3600);
                } else {
                    setcookie("recordar", $_POST['remember'], time() - 3600);
                    setcookie("usuario", $_POST['usuario'], time() + 1);
                }
                header('Location: inicio.php');
            } else {
                $error = true;
            }
        }
    }
    ?>

    <h1 class="text-center text-success">Iniciar Sesión</h1>
    <div class="container card py-2">
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3 mt-3">
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" placeholder="Nombre de usuario" name="usuario" value="<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; ?>">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="pass" placeholder="Introduce la contraseña" name="pass" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>">
                </div>
                <div class="form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" value="<?php if (isset($_POST['remember'])) echo 'checked'; ?>"> Recuerdame
                    </label>
                </div>
                <?php if ($error) {
                    echo "<h3 style='color: red'>ERROR. USUARIO O CONTRASEÑA INCORRECTA.</h3>";
                } ?>
                <button type="submit" name="entrar" class="btn btn-success">Entrar</button>
            </form>
        </div>
    </div>

</body>

</html>