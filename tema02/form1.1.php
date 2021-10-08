<?php
    $nomCorrecto = true;
//    $apellCorrecto = true;
//    $modulosCorrecto = true;
    if(isset($_POST['enviar'])){
        if($_POST['nombre'] == 'Pepe' && $_POST['apell'] == 'Cabeza' && isset($_POST['modulos']) ){
                $nomCorrecto = true;
  
            } else {
                $nomCorrecto = false;
            }
            if($nomCorrecto){
                    ?>
                    <form action="" method="POST">
                        Nombre: <input type="text" name="nombre"
                                       value="<?php if($_POST['nombre'] == 'Pepe') echo $_POST['nombre'];?>" > 
                                           <?php if($_POST['nombre'] != 'Pepe') echo "Nombre incorrecto";?> <br/> 
                        Apellidos: <input type="text" name="apell" 
                                          value="<?php if($_POST['apell'] == 'Cabeza') echo $_POST['apell'];?> ">
                                              <?php if($_POST['apell'] != 'Cabeza') echo "Apellido incorrecto";?><br/>
                        Ciclos: <?php if(!isset($_POST['modulos'])) echo ' Selecciona algún módulo';  ?> <br>
                        <input type="checkbox" name="modulos[]" value="DWES" <?php if(isset($_POST['modulos']) && in_array("DWES", $_POST['modulos'])) echo 'checked = checked';?> >Desarrollo Entorno Web Servidor </input><br>
                        <input type="checkbox" name="modulos[]" value="DWEC" <?php if(isset($_POST['modulos']) && in_array("DWEC", $_POST['modulos'])) echo 'checked = checked';?> >Desarrollo Entorno Web Cliente </input><br>
                        <input type="submit" name="enviar" value="Enviar"/><br/>

                    </form>

                      <?php 
                }
            } else { ?>
           <form action="" method="POST">
                Nombre: <input type="text" name="nombre"><br>
                Apellidos: <input type="text" name="apell"><br>

                Módulos: <br>
                <input type="checkbox" name="modulos[]" value="DWES">Desarrollo Web Entorno Servidor</input><br>
                <input type="checkbox" name="modulos[]" value="DWEC">Desarrollo Web Entorno Cliente</input><br>

                <input type="submit" name="enviar" value="Enviar">
            </form>

            <?php }
        ?>
