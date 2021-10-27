<form action="ejem22.php" method="POST">
    Nº Matricula: <input type="number" name="matri"><br>
    Curso: <input type="text" name="curso"><br>
    Año: <input type="text" name="anno"><br>
    <input type="hidden" name="nombre" value="<?php echo $_POST['nombre'];  ?>">
    <input type="hidden" name="apell" value="<?php echo $_POST['apell'];  ?>">

    <input type="submit" name="enviar" value="Enviar">
</form>





