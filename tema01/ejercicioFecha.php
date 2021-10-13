<h1> FECHA ACTUAL DEL SISTEMA </h1>
<?php

    function fechaAEspanol($nomDia, $numDia, $nomMes, $anio){
        $diaFecha = "kk";
        $mesFecha = "kk2";
        date_default_timezone_set('Europe/Madrid'); 
        
        switch ($nomDia){
            case 1: $diaFecha = "Lunes";    break;
            case 2: $diaFecha = "Martes";   break;
            case 3: $diaFecha = "Miércoles";break;    
            case 4: $diaFecha = "Jueves";   break;
            case 5: $diaFecha = "Viernes";  break;
            case 6: $diaFecha = "Sábado";   break;
            case 7: $diaFecha = "Domingo";  break;
        }        
        
        switch ($nomMes){
            case 1: $nomMes = "Enero";      break;
            case 2: $nomMes = "Febrero";    break;
            case 3: $nomMes = "Marzo";      break;
            case 4: $nomMes = "Abril";      break;
            case 5: $nomMes = "Mayo";       break;
            case 6: $nomMes = "Junio";      break;
            case 7: $nomMes = "Julio";      break;
            case 8: $nomMes = "Agosto";     break;
            case 9: $nomMes = "Septiembre"; break;
            case 10: $nomMes = "Octubre";   break;
            case 11: $nomMes = "Noviembre"; break;
            case 12: $nomMes = "Diciembre"; break;
        }        
        return $diaFecha." ".$numDia." ".$nomMes." ".$anio;  
    }

    
    $fecha = fechaAEspanol(date('N'), date("d"), date("n"), date("Y"));
    echo $fecha;
?>
