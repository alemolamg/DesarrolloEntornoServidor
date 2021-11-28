<?php
require_once("controllers/funciones.php");
if (isset($_POST['volver'])) {
    header('Location: login.php');
}

if (isset($_POST['guardar'])) {
    $conx = crearConexion();
    if (isset($_POST['user'])) {
        //$_POST['user'],$_POST['pass'],$_POST['nombre'], $_POST['apellidos'],$_POST['local'],$_POST['direc'],
        //$_POST['tipoLetra']
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once("method/referencias.php"); ?>
    <title>Registro</title>
</head>

<body>
    <h1 class="text-center p-3 text-white bg-success">Registro</h1>
    <div class="container card py-3">
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
                <div class="mb-3 mt-3 ">
                    <label for="nombre apel" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
                </div>
                <div class="mb-3 mt-3">
                    <label for="apel" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" id="apel" placeholder="Apellidos" name="apel" value="<?php if (isset($_SESSION['apel'])) echo $_SESSION['apel']; ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="direc" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direc" placeholder="Dirección" name="direc" value="<?php if (isset($_SESSION['user'])) echo $_SESSION['user']; ?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="local" class="form-label">Localidad:</label>
                    <input type="text" class="form-control" id="local" placeholder="Localidad" name="local">
                </div>
                <div class="mb-3 mt-3">
                    <label for="loca" class="form-label">Colores:</label>
                    <div class="row">
                        <div class="col">
                            Color fondo: <input type="color" class="form-control-color" name="colorFondo" id="" value="#2878C8">
                        </div>
                        <div class="col">
                            Color Letra: <input type="color" class="form-control-color" name="colorLetra" id="" value="#FFFFFF">
                        </div>
                        <br>
                    </div>
                    Tipo Letra: <select name="tipoLetra" class="form-control form-select" id=""></select>
                    Tamaño Letra: <select name="tamLetra" class="form-control form-select" id=""></select>

                </div>

                <button type="submit" name="guardar" class="btn btn-success">Guardar Usuario</button>
                <button type="submit" name="volver" class="btn btn-success">Volver</button>
                <?php if ($error) {
                    echo "<h3 class='error pt-3' style='color:red'>ERROR. USUARIO O CONTRASEÑA INCORRECTA.</h3>";
                } ?>
            </form>
        </div>
    </div>
</body>

</html>