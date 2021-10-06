<?php
    echo "<table border='1'>";
    $num = 1;
    for($i = 1;$i <= 5; $i++){     //gestiona las filas
        echo "<tr>";
        for($j = 1;$j <= 7; $j++){ //gestiona las columnas
            echo "<td>".$num++."</td>";
        }                    
        echo "</tr>";
    }
    
    echo "</table>";
    
?>


<!--//4. Elabora un script que permita construir una tabla de 5 filas y 7 columnas que
//contengan los sucesivos números naturales desde 1 hasta 35. Utiliza bucles del
//tipo for, que igual que while y do while permiten ser anidados.-->
