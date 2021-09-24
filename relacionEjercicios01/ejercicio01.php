<html>
    <head>
        <title>Ejercicio 01</title>
    </head>
    <body>
        <h1> Conocer si un año es bisiesto </h1>

        <?php
            $anio = 2020;
            $bisi = false;
            if($anio%4 == 0)
                if($anio%100 != 0)
                        $bisi = true;
                    else 
                        if($anio%400 == 0)
                            $bisi=true;
                    
                    
            if($bisi == true)
                echo "El año ".$anio." es bisiesto.";
            else
                echo "El año ".$anio." no es bisiesto.";

        ?>
    </body>
</html>



