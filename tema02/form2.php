<h1>hola mundo</h1>

<?php

echo $_POST['nombre']." ".$_POST['apell']."<br/>";
if(isset($_POST['modulos'])){
    foreach ($_POST['modulos'] as $value){
        echo $value.", ";
    }
} else{
    echo "El alumno no está matriculado";
}

//echo $_REQUEST['nombre']." ".$_REQUEST['apell']."<br/>";
//echo $_GET['nombre']." ".$_GET['apell']."<br/>";

?>
<br><br>
<a href="form1.php">Volver</a>