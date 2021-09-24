<?php
    function ordenarTresNumeros ($num1,$num2,$num3){
    
    $mayor1 = 0; $mayor2 = 0; $mayor3 = 0;
    
            if($num1 > $num2){
                if ($num1 > $num3){
                    $mayor1 = $num1;
                    if ($num2 > $num3){
                        $mayor2 = $num2;
                        $mayor3 = $num3;
                    } else{
                        $mayor2 = $num3;
                        $mayor3 = $num2;
                    }                   
                } else {
                    $mayor1 = $num3;
                    $mayor2 = $num1;
                    $mayor3 = $num2;
                }           
            } else
                if($num2 > $num3){
                    $mayor1 = $num2;
                    if ($num1 > $num3){
                        $mayor2 = $num1;
                        $mayor3 = $num3;
                    } else{
                        $mayor2 = $num3;
                        $mayor3 = $num1;
                    }
                } else {
                    $mayor1 = $num3;
                    $mayor2 = $num2;
                    $mayor3 = $num1;
                }
                    
    echo "Los número ordenados de mayor a menor son: <br / >";
    echo $mayor1.", ".$mayor2.", ".$mayor3;
    
    }
    
    ordenarTresNumeros(48, 7, 22);

?>

<!-- 9. Ordena tres números de mayor a menor. -->

