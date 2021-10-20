<?php
if(isset($_POST["enviar"])){
    $arrayCont = json_decode($_POST["contactos"],true);
    if(!is_array($arrayCont))
        $arrayCont=array();
    if(empty($_POST["nombre"])){
        echo "Debe introducir un nombre";
    } else{
        if (empty($_POST["telefono"])){
            if (array_key_exists($_POST["nombre"], $arrayCont)){
                unset($arrayCont[$_POST["nombre"]]);
            } else{
                echo "No existe el nombre a eliminar";
            }
        } else{
            
            if (!array_key_exists($_POST["nombre"], $arrayCont)){
                echo "Elemento añadido";
            } else {
                echo "Elemento modificado";
            }
            $arrayCont["$_POST[nombre]"] = $_POST["telefono"];
            
        }
    }
    
} 


?>

<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Telefono</th>
    </tr>
    <tr>
        <?php
        if(isset($_POST["enviar"])){
            if(isset($arrayCont)){
                foreach ($arrayCont as $nombre => $telefono) {
                    echo '<tr>';
                    echo '<td>'.$nombre.'</td><td>'.$telefono.'</td>';
                    echo '</tr>';
                }
            }
        }
        ?>

</table>

<div>
    
</div>


<form action="" method="post">
    nombre: <input type="text" name="nombre"><br>
    telefono: <input type="number" name="telefono"><br>
    <input type="hidden" name="contactos" value='<?php if(isset($_POST["enviar"])) echo json_encode($arrayCont);?>'>
    <input type="submit" name="enviar" value="Enviar">
</form>