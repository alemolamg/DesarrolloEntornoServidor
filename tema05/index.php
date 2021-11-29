<html>

<head>
    <title>Ejercicio Ejemplo</title>
</head>

<body>
    <h2>Ejercicio Ejemplo Clases</h2>
    <?php
    function mostrarPersona($per)
    {
        echo "Nombre: " . $per->getNombre() . " , Nº Persona: " . $per::getNumPerson() . "<br>";
    }

    require_once './Persona.php';
    $p = new Persona("Ale", "Molero", "23");
    //echo "Nombre: " . $p->getNombre() . " , Nº Persona: " . Persona::getNumPerson() . "<br>";
    echo "Nombre: " . $p->nombre . " , Nº Persona: " . Persona::getNumPerson() . "<br>";
    echo "Cambio el nombre <br>";
    $p->nombre = "Maria";
    echo "Nombre: " . $p . " , Nº Persona: " . Persona::getNumPerson() . "<br>";
    $p1 = new Persona();

    $p3 = clone ($p);
    $p3->nombre = "Ricardo";
    $p3->apell = "Milos";
    
    $p3 = clone ($p);
    echo $p3;
    if($p == $p3){
        echo '<br>Son iguales';
    } else{
        echo "<br> Son Distintos";
    }

    ?>
</body>

</html>