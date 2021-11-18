<?php

if (isset($_COOKIE["miCookie"])) {
    echo $_COOKIE["miCookie"] . "<br>";
} else {
    setcookie("miCookie", "Nombre2", time() + 60);
}
?>
<a href="ejemploCookies.php">Ir a Página 1</a>