<?php
    echo "<table border='1'>";
    $num = 1;
    $i = 0;
    $j = 0;
    do{     //gestiona las filas
        echo "<tr>";
        do{ //gestiona las columnas
            echo "<td>".$num++."</td>";
            $j++;
        }while ($j < 7);                 
        echo "</tr>";
        $i++;
        $j = 0;
    }while($i < 5);
    
    
    echo "</table>";
    
?> 

<!--5. Repite el ejercicio anterior usando while y do while.-->

