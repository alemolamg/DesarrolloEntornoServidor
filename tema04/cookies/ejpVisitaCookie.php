<?php
if (isset($_COOKIE["miCookie"])) {
    echo date("l N F Y G:i:s", $_COOKIE["miCookie"]) . "<br>";
    $_COOKIE["miCookie"];
} else {
    setcookie("miCookie", time(), time() + 60);
}
?>
<h1>Bienvenido a la web</h1>
<div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum hic, voluptatem neque consequatur architecto,
    veritatis sint est quam, animi aliquam asperiores ea sequi fuga dolores repellendus quae? Excepturi, maiores sed.
</div>