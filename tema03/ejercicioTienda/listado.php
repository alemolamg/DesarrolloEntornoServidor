<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<?php
try {
	require_once "metodos/funciones.php";
	$conx = conexionBD();
} catch (\Throwable $th) {
	echo $th->getMessage() . '<br>';
}

?>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Plantilla para Ejercicios Tema 3</title>
	<link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="encabezado">
		<h1>Ejercicio: </h1>
		<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			Producto:
			<select name="familia" id="familia">
				<?php
				try {
					selectorFamilia($conx, $_POST['familia']);
				} catch (\Throwable $th) {
					echo $th->getMessage() . '<br>';
				}
				?>
			</select>
			<input type="submit" value="Mostrar productos" name="mostrar">
		</form>
	</div>

	<div id="contenido">
		<h2>Contenido</h2>
		<?php
		if (isset($_POST['mostrar']) && isset($_POST['familia'])) {
			mostrarProductosFamilia($conx, $_POST['familia']);
		} else {
			echo "BORRA ESTE MENSAJE";
		}

		?>


	</div>
	<div id="pie">
	</div>
</body>

</html>