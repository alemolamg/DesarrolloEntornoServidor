
<form action="">
    Nombre: <input type="texto" name="nombre">
    DNI: <input type="texto" name="DNI">
    Fecha_Nac: <input type="texto" name="fechaNac" placeholder="dd-mm-yyyy">
    Salario: <input type="number" name="salario" placeholder="mínimo 2000€">
    <input type="submit" value="Aceptar">
</form>

<?php
    $cadena = '123hola87';
    $validaNombre = '/^[a-z\d_]{1,30}$/';
    $validaDNI= '/[\d]{8,8}';
    
    echo preg_match('/hola/', $cadena);
    
    preg_match( $validaNombre); //Longitud máxima entre 1 y 30
    
            

?>

