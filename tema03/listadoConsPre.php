<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Listado Tienda</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>   

<div id="encabezado">
	<h1>Ejercicio: Listado de productos de una família </h1>
        <?php
    $dwes = new mysqli('localhost','dwes','abc123.','dwes');
    if ($dwes->connect_errno){     //Entra si hay hay errores
            //$mensaje = $dwes->connect_errno."-".$dwes->connect_error;
            $error = $dwes->connect_errno;
    } else {
        $error = $dwes->connect_errno;
        $mensaje = "No hay errores";
        
    ?>
	<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            Familia: <select id="selectPro" name="selectPro">
                <?php 
                    $resProd = $dwes ->query('select * from producto ORDER BY nombre_corto', MYSQLI_USE_RESULT);
                    $producto = $resProd->fetch_object();
                    while ($producto != null) { //funciona igual que los cursores en mysql, bucle hasta llegar a última fila
                        //echo "<option value='$producto->cod' > $producto->nombre_corto</option>"; //No contemplamos selección
                       
                        echo "<option value='$producto->cod' ";
                        if(isset($_POST['enviar']) && $producto->cod === $_POST['selectPro']){   //Verifico si está seleccionado
                            echo 'selected';
                        }
                        echo "> $producto->nombre_corto </option>";
                        
                        
                        $producto = $resProd->fetch_object();
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
	<h2>Stock del producto en las tiendas</h2>
        
        <?php
            if(isset($_POST["enviar"])){
                $dwes = new mysqli('localhost','dwes','abc123.','dwes');
                if ($dwes->connect_errno){     //Entra si no hay errores
                    echo $dwes->connect_errno."-".$dwes->connect_error;
                } else {
                    $consulta = $dwes->stmt_init();
                    if($consulta->prepare("SELECT ti.nombre nomTi, pro.nombre_corto nomPro, st.unidades unis , ti.cod codt FROM tienda ti, stock st, producto pro
                                                WHERE ti.cod = st.tienda AND st.producto = pro.cod AND st.producto = ?")){
                        $consulta->bind_param('s', $_POST["selectPro"]);
                        $consulta->execute();
                        $resStock = $consulta->get_result();
                        //echo '<br><br>';
                        $busqueda = $resStock->fetch_object();
                        echo '<h4>Producto: '. $busqueda->nomPro.'</h4>';
                        echo '<form action="" method="post">';
                        $listTiendas = array();
                        
                        while ($busqueda != null) { //funciona igual que los cursores en mysql, bucle hasta llegar a última fila
                            //echo "Producto: ".$stock->producto.'>'.$stock->producto.'<br>';
                            echo "Tienda, ".$busqueda->nomTi .' : ';
                            echo '<input type="number" name="unidades[]" value="'.$busqueda->unis .'">'.' Unidades<br><br>';
                            $busqueda = $resStock->fetch_object();
                            $listTiendas[] = $busqueda->codt;
                        }
                        ?>
                            <input type="hidden" name="tiendas" value="<?php json_encode($listTiendas);  ?>">
                            <input type="hidden" name="selectPro" value="<?php $_POST['selectPro'];?>">
                            <input type="submit" name="actual" value="Actualizar">
                        </form>
                        <?php
                    }
                }
            } else{ 
                if (isset ($_POST["actual"])) {
                    $dwes = new mysqli('localhost','dwes','abc123.','dwes');
                    if ($dwes->connect_errno){     //Entra si hay errores
                        echo $dwes->connect_errno."-".$dwes->connect_error;
                    } else {
                        $updUnis = $dwes->stmt_init();
                        $listaTiendas = json_decode($_POST["tiendas"]);
                        $unidades = $_POST["unidades"];
                        
                        if($updUnis->prepare("UPDATE stock SET unidades = ? WHERE tienda = ? AND producto = ?")){
                            for ($i = 0; $i < sizeof($unidades);$i++){
                                $updUnis->bind_param('iis', $unidades[$i],$listTiendas[$i],$_POST["selectPro"]) ;
                                $updUnis->execute();
                            }
                            echo "Ejecución finalizada";
                        }
                        }
                    }
                }
        ?>
</div>

<div id="pie">
    <?php
        if ($error != 0){
            //echo $error;
            echo $mensaje;
            echo $dwes->connect_errno."-".$dwes->connect_error;
        }
    ?>
</div>
</body>
</html>