<?php
echo '<h1>Hola ' . $_COOKIE['usuario'] . '</h1>';
?>
<form action="./login.php" method="POST">
    <input type="submit" value="Volver" name="volver">
</form>