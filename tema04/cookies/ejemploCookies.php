<?php
// Creación de Cookie
setcookie("miCookie", "Antonio", time() + 60);
if (isset($_COOKIE["miCookie"])) {
    echo $_COOKIE["miCookie"] . "<br>";
}
?>
<a href="ejemploCookie2.php">Ir a Página 2</a>