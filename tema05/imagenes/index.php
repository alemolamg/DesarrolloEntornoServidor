<?php
if (isset($_POST['enviar'])) {
    echo 'Nombre IMG: ' . $_FILES['foto']['name'] . "<br>";
    echo 'Dirección: ' . $_FILES['foto']['tmp_name'] . "<br>";
    echo 'Tamaño: ' . $_FILES['foto']['size'] . "<br>";
    echo 'Tipo: ' . $_FILES['foto']['type'] . "<br>";
    echo 'Error (!= 0): ' . $_FILES['foto']['error'] . "<br>";

    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $fich = $_FILES['foto']['name'] . "-" . time();
        $ruta = "fotos/" . $fich;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);

        $conex  = new mysqli('localhost', "dwes", "abc123.", "imagenes");
        $sql = "INSERT INTO fotos (ruta) VALUES ('$ruta') ";
        $conex->query($sql);
        $conex->close();
    } else {
        echo "<br>ERROR AL SUBIR EL FICHERO<br><br>";
    }
}

if (isset($_POST['mostrar'])) {
    $conex  = new mysqli('localhost', "dwes", "abc123.", "imagenes");
    $sql = "SELECT * FROM fotos";
    $result = $conex->query($sql);
    while ($fila =  $result->fetch_object()) {
        echo "<img src='$fila->ruta' width='180'>";
    }
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <!-- Obligatorio para enviar ficheros -->
    Foto: <input type="file" name="foto" accept="jpg jpeg"> <br>
    <input type="submit" value="Enviar" name="enviar">
    <input type="submit" value="Mostrar" name="mostrar"><br>
</form>