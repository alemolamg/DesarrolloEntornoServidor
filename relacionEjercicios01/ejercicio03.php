<html>
    <head>
        <title>Ejercicio 03</title>
    </head>
    <body>
        <?php
            $num1 = 7;
            $num2 = 41;
            $num3 = 90;
            
            if($num1 > $num2)
                if ($num1 > $num3)
                    echo "El mayor es el ".$num1;
                else
                    echo "El mayor es el ".$num3;
            else
                if($num2 > $num3)
                    echo "El mayor es el ".$num2;
                else
                    echo "El mayor es el ".$num3;    
        ?>
    </body>
</html>

// 3. De tres números A, B y C mostrar el valor máximo

