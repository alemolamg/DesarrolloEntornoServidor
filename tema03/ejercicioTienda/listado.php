<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Listado Tienda</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    $dwes = new mysqli('localhost','dwes','abc123.','dwes');
    if ($dwes->connect_errno){     //Entra si no hay errores
            echo $dwes->connect_errno."-".$dwes->connect_error;
    } else {
        
    ?>

<div id="encabezado">
	<h1>Ejercicio: Listado de productos de una família </h1>
	<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            Familia: <select id="selectPro" name="selectPro">
                <?php 
                    $resProd = $dwes ->query('select * from producto', MYSQLI_USE_RESULT);
                    $stock = $resProd->fetch_object();
                    while ($stock != null) { //funciona igual que los cursores en mysql, bucle hasta llegar a última fila
                        echo "<option value='$stock->cod' >$stock->nombre_corto</option>";
                        $stock = $resProd->fetch_object();
                    }
                ?>
            </select>
            <!--<input type="hidden" name="elegido" value="selectPro"> Al final no lo utilizo -->
            <input type="submit" name="enviar" value="Mostrar Stock">
	</form>
    <?php  
    $dwes ->close();
                    }?>
</div>

<div id="contenido">
	<h2>Contenido</h2>
        <?php
            if(isset($_POST["enviar"])){
                $dwes = new mysqli('localhost','dwes','abc123.','dwes');
                if ($dwes->connect_errno){     //Entra si no hay errores
                    echo $dwes->connect_errno."-".$dwes->connect_error;
                } else {
                    echo 'muestro: '. $_POST["selectPro"];
                    $resStock = $dwes ->query("SELECT st.* FROM tienda ti, stock st
                                                WHERE ti.cod = st.tienda AND st.producto = '$_POST[selectPro]'");
                    echo '<br><br><br>';
                    $stock = $resStock->fetch_object();
                    while ($stock != null) { //funciona igual que los cursores en mysql, bucle hasta llegar a última fila
                        echo "Producto: ".$stock->producto.'>'.$stock->producto.'<br>';
                        echo "Tienda: ".$stock->tienda.'>'.$stock->tienda.'<br>';
                        $stock = $resStock->fetch_object();
                    }
                }
            }
        ?>
</div>

<div id="pie">
</div>
</body>
</html>
