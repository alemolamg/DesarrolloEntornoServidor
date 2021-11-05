<h1>Tus datos son: </h1>
<?php
if(isset($_POST['aceptar'])){
    echo '<h2> Tus datos se han guardado correctamente</h2>';
} else{
    echo 'Nombre: '.$_POST['nombre']."<br>";
    echo 'Apellidos: '.$_POST['apell']."<br>";
    echo 'Nº Matrícula: '.$_POST['matri']."<br>";
    echo 'Curso: '.$_POST['curso']."<br>";
    echo 'Año: '.$_POST['anno']."<br>";
}
?>

<form action="" method="post">
    <input type="submit" name="aceptar" value="Aceptar"><br>
</form>

<form action="ejem20.php" method="post">
    <input type="submit" name="cancelar" value="Cancelar">
</form>

