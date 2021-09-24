<html>
    <head>
        <title>Ejercicio 02</title>
    </head>
    <body>
        <table border="1">
            <?php
            $impar = 0;

            function generarImpar(){
                    do{
                        $valor = rand(1,100);
                    }while($valor%2 == 0);
                    
                    return $valor;
                }
                $impar = generarImpar();
                
                function incremento($num){
                    return $num+2;
                }
                
                for($i = 1;$i <= 10; $i++){
                    echo "<tr>";
                    for($j = 1;$j <= 10; $j++){
                        $impar = incremento($impar);
                        echo "<td>".$impar."</td>";
                    }                    
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>

