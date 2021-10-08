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
    
    function esBisiesto($anio){
            $bisi = false;
            if($anio%4 == 0)
                if($anio%100 != 0)
                        $bisi = true;
                    else 
                        if($anio%400 == 0)
                            $bisi=true;

            return $bisi;
    }
    
    function comprobarFecha($dia, $mes, $anno) {
        $fechaCorrecta = true; $mes31d = false;
        if($dia > 0 && $dia < 32  && $mes > 0 && $mes < 13 && $anno > 0){
            if($mes == 1 || $mes == 3 || $mes == 5 || $mes == 7 || $mes == 8 || $mes == 10 || $mes == 12){
                $mes31d = true;
                $fechaCorrecta = true;                
            } else{
                if($mes != 2){
                    if ($dia > 30)
                        $fechaCorrecta = false;
                } else {
                    if(esBisiesto($anno)){
                        if($dia > 29)
                            $fechaCorrecta = false;
                    } else
                        if ( $dia > 28)
                            $fechaCorrecta = false;                   
                }
            }
            
            
        }  else{ echo "Los números no pueden ser menores de 1"; $fechaCorrecta = false; }
        
        return $fechaCorrecta;
}
    
    function gestionarFecha() {
        $funciona = false;
        if(isset($_POST['enviar'])){
            $validarFecha = false;
            if(!(empty($_POST['dia']) || empty($_POST['mes']) || empty($_POST['anno']))){
                $validarFecha = comprobarFecha($_POST['dia'], $_POST['mes'], $_POST['anno']);
                //$validarFecha = checkdate($_POST['dia'], $_POST['mes'], $_POST['anno']);
                if($validarFecha){
                    $funciona = true;
                } else
                    echo "Fecha incorrecta";
            }
        }
        return $funciona;
}

    // Comienza el programa
    if(isset($_POST['enviar'])){
        if(gestionarFecha()){
            $miTime = mktime(0, 0, 0, $_POST['mes'], $_POST['dia'], $_POST['anno']);
            echo '<p>'. fechaAEspanol(date('N', $miTime), $_POST['dia'], date("n",$miTime), $_POST['anno']).'</p>';
        }
    }
?>

<html>
    <head>
        <title>EjercicioFecha</title>
    </head>
    <body>
        <form action="" method="post">
            Año: <input type="number" name="anno"><br>
            Mes: <input type="number" name="mes"><br>
            Dia: <input type="number" name="dia"><br>
            <!-- <option value="ejemplo">ejemplo</option> -->
            <input type="submit" name="enviar" value="Enviar">
            </input>
        </form>

    </body>
</html>

