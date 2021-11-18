<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Plantilla para Ejercicios Tema 3</title>
	<link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	require_once "metodos/funciones.php";
	$conx = conexionBD(); ?>


	<div id="encabezado">
		<h1>Ejercicio: </h1>
		<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		</form>
	</div>


	<div id="contenido">
		<h2>Modificar Jugador</h2>
		<?php
		if (isset($_POST['guardar'])) {
			if (updateProducto($conx, $_POST['codPro'], $_POST['nombre'], $_POST['nomCorto'], $_POST['descripcion'], $_POST['PVP'], $_POST['familia'])) {
				echo '<h2 style="color: green;">Producto actualizado correctamente</h2>';
			} else
				echo '<h2 style="color: red;">ERROR AL ACTUALIZAR, VUELVE A EMPEZAR</h2>';
		}
		?>
		<?php $pro = selectorCodigo($conx, $_POST['codPro'])  ?>
		<form action="" method="POST">

			nombre: <input type="text" name="nombre" id="" value="<?php echo $pro->nombre; ?>"><br>
			nombre_corto:<input type="text" name="nomCorto" id="" value="<?php echo $pro->nombre_corto; ?>"><br>
			<!-- Descripción: <input type="textarea" name="descripcion" id="" value="<?php //echo $pro->descripcion; 
																						?>"><br> -->
			Descripción: <textarea name="descripcion" id="" cols="30" rows="10"><?php echo $pro->descripcion; ?></textarea> <br>
			Precio (PVP):<input type="number" name="PVP" value="<?php echo $pro->PVP; ?>"><br>
			Familia: <select name="familia" id="">
				<?php selectorFamilia($conx, $pro->familia); ?>
			</select><br>
			<input type="hidden" name="codPro" value=<?php echo $_POST['codPro']; ?>>
			<input type="button" value="Volver" onclick="location.href='./listado.php'">
			<input type="submit" value="Guardar" name="guardar">
		</form>

	</div>

	<div id="pie">
	</div>
</body>

</html>