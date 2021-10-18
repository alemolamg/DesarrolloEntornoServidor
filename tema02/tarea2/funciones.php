<?php
    function guardarContacto($array) {
        //$nuevoCont = array($_POST['nombre'] => $_POST['phone']);
        $array = array_push(array($_POST['nombre'] => $_POST['phone']));
        //arsort($array);        //Ordena los contactos en orden alfabético
    }

?>

