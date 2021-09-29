<!-- Ejercicio 01 -->
<h1> Ejercicio 01 Server </h1>
<br/>
<h2>Manera Foreach</h2>
<table border="1">
            <tr> <th>Índice</th> <th>Valor</th> </tr>
        <?php
            foreach ($_SERVER as $indice => $valor){
                echo "<tr>";
                echo "<td>indice: ".$indice."</td> <td>valor: ".$valor."</td>";
                echo "</tr>";
            }
        ?>
</table>
<br/> <br/>
<h2>Manera while + each</h2>
<table border="1">
            <tr> <th>Índice</th> <th>Valor</th> </tr>
        <?php
                reset($_SERVER);
                while ($puntero = each($_SERVER)) {
                    echo "<tr>";
                    echo "<td>indice: ".$puntero["key"]."</td> <td>valor: ".$puntero["value"]."</td>";
                    echo "</tr>";
                }
        ?>
</table>


<br/><br/><br/>
<h1>Ejercicio 02 Matriz</h1>
<?php
    $matriz = array(
        "marketing" => array("nombre" => "Pedro", "apellido" => "Martos", "salario" => 1300 , "edad" =>42),
        "direccion" => array("nombre" => "Sabrina", "apellido" => "Cabrera", "salario" => 1790 , "edad" =>22),
        "ventas" => array("nombre" => "Fran", "apellido" => "García", "salario" =>1200 , "edad" =>38),
        "Informática" => array("nombre" => "Lorenzo", "apellido" => "Von Matterhorn ", "salario" =>5000, "edad" =>28)
    );
    
    echo '<table border="2">';
    
    $indices = array_keys($matriz["ventas"]);
    echo "<tr> <th></th>";
    foreach ($indices as $key => $dato)
        echo  '<td>'. $dato."</td>";
    echo "</tr>";
    
    
    foreach ($matriz as $key => $fila){
        echo "<tr> <th>".$key."</th>";
        foreach ($fila as $data => $colum){
            echo '<td>'.$colum."</td>";
        }
        echo "</tr>";
    }
    echo '</table>';
?>


