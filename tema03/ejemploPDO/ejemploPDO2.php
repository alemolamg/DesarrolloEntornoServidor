<?php
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION];
    try {    
    
    $dwes = new PDO('mysql:host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.', $options);
    $result = $dwes->query("SELECT * FROM producto ORDER BY nombre_corto");
    if ($dwes->errorCode() != 0) {
        print_r($dwes->errorInfo());
        die("ERROR");
    }
    
    $result = $dwes->prepare("SELECT * FROM producto WHERE cod=:cod");
    if ($result === false){
        die('ERROR');
    }
    
    $codProducto = "PBELLI810323";
    $result->bindParam(":cod", $codProducto);
    $result->execute();
    if($result){
        //echo $result->errorInfo();
        while ($fila = $result->fetch()) {
            echo "Nombre: " .$fila->nombre_corto ."<br>";
            echo "Codigo: " .$fila->cod ."<br>";
            echo "Precio: " .$fila->PVP."<br>";
            echo ' ======================= <br>';
        }
    }
    
    } catch (PDOException $ex) {
        echo 'ERROR: ' . $ex->getMessage();
}
