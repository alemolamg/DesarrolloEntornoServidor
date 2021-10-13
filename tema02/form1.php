<!<!doctype html>

        <?php
            if(isset($_POST['enviar'])){
                if($_POST['nombre'] == 'Pepe' && $_POST['apell'] == 'Cabeza' && isset($_POST['modulos']) ){
                    echo $_POST['nombre']." ".$_POST['apell']."<br/>";
                    //if(isset($_POST['modulos'])){
                        foreach ($_POST['modulos'] as $value){
                            echo $value.", ";
                        }
//                    } else{
//                        echo "El alumno no está matriculado";
//                    }
                } else {
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
<!-- <html>
    <head>
        <title>Primer Formulario</title>
    </head
    <body>
        <form action="" method="POST">
            Nombre: <input type="text" name="nombre"
                           value="<?php if($_POST['nombre'] == 'Pepe') echo $_POST['nombre'];?>" > 
                               <?php if($_POST['nombre'] != 'Pepe') echo "Nombre incorrecto";?> <br/> 
            Apellidos: <input type="text" name="apell" 
                              value="<?php if($_POST['apell'] == 'Cabeza') echo $_POST['apell'];?> ">
                                  <?php if($_POST['apell'] != 'Cabeza') echo "Apellido incorrecto";?><br/>
            Ciclos: <?php if(!isset($_POST['modulos'])) echo ' Selecciona algún módulo';  ?> <br>
            <input type="checkbox" name="modulos[]" checked="<?php if(in_array("DWES", $_POST['modulos'])) echo 'checked';  ?>" value="DWES">Desarrollo Entorno Web Servidor </input><br>
            <input type="checkbox" name="modulos[]" checked="<?php if(in_array("DWEC", $_POST['modulos'])) echo 'checked';?>" value="DWEC">Desarrollo Entorno Web Cliente </input><br>
            <input type="submit" name="enviar" value="Enviar"/><br/>
            
        </form>
        <a href="form2.php?nombre=PEPE&apell=Lopez">Form2.php</a> 
        <br><br>

             
    </body>
</html> -->
