<html>
    <head>
        <title>Ejercicio 03</title>
    </head>
    <body>
        <?php
            $valor1 = 7;
            $valor2 = 41;
            $valor3 = 90;
            
            if($valor1 > $valor2)
                if ($valor1 > $valor3)
                    echo "El mayor es el ".$valor1;
                else
                    echo "El mayor es el ".$valor3;
            else
                if($valor2 > $valor3)
                    echo "El mayor es el ".$valor2;
                else
                    echo "El mayor es el ".$valor3;    
        ?>
    </body>
</html>

// 3. De tres números A, B y C mostrar el valor máximo

