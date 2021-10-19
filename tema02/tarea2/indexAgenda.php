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
        
        <?php 
            //$contactos = array("Pepe" => "625445566","Dani" => "666777222");
        if(isset($_POST["enviar"])){
            $contactos = json_decode($_POST["contac"]);
            if (empty($_POST["nombre"])){
                echo 'El nombre está vacio, escríbelo por favor';
            } else {
                 
            }
            
        }
          
        ?>
        
        <table border="2">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($_POST["enviar"])){
                        if(isset($contactos)){
                            foreach ($contactos as $nombre => $telefono) {
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
                Telefono: <input type="number" name="phone"><br>
                <input type="hidden" name="contac" value="<?php if(isset($contactos)) echo json_encode($contactos)?>">
                <input type="submit" name="enviar" value="Enviar">
            </form>
        </div>
        
    </body>
</html>

