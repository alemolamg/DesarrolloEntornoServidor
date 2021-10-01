<table border="3">
    <thead>
        <tr>
            <th>Equipo</th>
            <th>Estadio</th>
        </tr>
    </thead>
    <tbody>
        
<?php
    $estadios_de_futbol=array("Barcelona" => "Camp Nou","Real Madrid" => "Santiago Bernabeu",
        "Valencia" => "Mestalla","Real Sociedad"  => "Anoeta");
    
    foreach ($estadios_de_futbol as $equipo => $estadio) {
        echo "<tr><td>$equipo</td><td>$estadio</td></tr>";
    }   
?>
    
    </tbody>
</table>
<br/>

<?php
    echo "Elimino el estadio del Real Madrid<br/>";
    unset($estadios_de_futbol["Real Madrid"]);
    
    echo "<br/> La lista queda tal que así: <br/>";
    foreach ($estadios_de_futbol as $estadio) {
        echo "$estadio, ";
    }

?>

