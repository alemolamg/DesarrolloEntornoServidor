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
<html>
    <head>
        <title>Agenda Personal</title>
        <style>
            .bajoDch {float:right;position:absolute;margin-bottom:0px;margin-right:0px;bottom:0px; right:0px;}
            .altoDch2 {color: #f00; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
            .altoDch1 {color: #00f; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
        </style>
    </head>
    <body>       
        <table border="2">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($_POST['enviar'])){
                        if(isset($arrayCont)){
                            foreach ($arrayCont as $nombre => $telefono) {
                                echo '<tr>';
                                echo '<td>'. $nombre .'</td> <td>'.$telefono.'</td>';
                                echo '</tr>';
                            }
                        }
                    }
                ?>
                
            </tbody>
        </table>

        
        <div class="bajoDch">
            <form action="" method="post">
                Nombre: <input type="text" name="nombre"><br>
                Telefono: <input type="number" name="telefono"><br>
                <input type="hidden" name="contactos" value=<?php if(isset($_POST["enviar"])) echo json_encode($arrayCont);?>>

                <input type="submit" name="enviar" value="Enviar">
            </form>
        </div>
        
    </body>
</html>

