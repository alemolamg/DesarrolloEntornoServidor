<?php
    $nums = array();
    for($i = 1;$i < 10; $i++){
        $nums[] = $i;
    }
    
    $media = 0;
    foreach ($nums as $pos => $value) {
        if($pos % 2 == 0){
            $media += $value;
        } else
            echo " $value,";
    }
    
    $media = $media / (count($nums)/2);
    echo "<br/>La media de los números en las posiciones pares es: $media";
            

?>

