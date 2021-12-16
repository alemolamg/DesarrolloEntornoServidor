<?php

class AlquilerController
{

    public static function aniadirAlq($dni, $codJuego)
    {
        $fechaAlq = Date('Y-m-d', time());
        $alquiler = new Alquiler($dni, $codJuego);
        $sql = ("INSERT INTO alquiler (DNI_cliente,Cod_juego,Fecha_alquiler) VALUES ('$dni','$codJuego',$fechaAlq)");
        $conex = new Conexion();
        $ok = true;
        if ($conex->exec($sql) == 0) {
            $ok = false;
        }

        if ($ok) {
            $conex->commit();
        } else {
            echo $conex->errorInfo();
            $conex->rollBack();
        }
    }

    public static function recuperarTodos()
    {
        $sql = "SELECT * FROM alquiler ORDER BY id";
        $conex = new Conexion();
        $result = $conex->query($sql);
        if ($conex->errorCode() != 0) {
            print_r($conex->errorInfo());
            die("ERROR");
        }

        if ($result->rowCount()) {
            $alq = new Alquiler('11111111C', "FH5-Xbox");
            //$j = new Juego('Juego Beta', "PC", 5, "kk.jpg");
            while ($fila = $result->fetch()) {
                $alq->nuevoAlquiler(
                    $fila->id,
                    $fila->DNI_cliente,
                    $fila->Cod_juego,
                    $fila->Fecha_alquiler,
                    $fila->Fecha_devol
                );

                $ListaAlquileres[] = clone ($alq);
            }
            return $ListaAlquileres;
        } else {
            return FALSE;
        }
    }

    public static function mostrarAlquilerPantalla()
    {
        $alquileres = self::recuperarTodos();
        if ($alquileres == FALSE) {
            echo "Error al extraer los datos";
        } else {
            $contador = 0;
            foreach ($alquileres as $alq) {
?>
                <div class="col-md-4 col-lg-3 col-8 my-2">
                    <form action="../View/vistaJuego.php" method="post">
                        <input type="hidden" name="codJuego" value="<?php //echo $alq->getCodigo(); 
                                                                    ?>">
                        <!-- <div class="card" style="cursor: pointer" onclick="location.href='#'"> <!-- Cambiar por funcion js -->
                        <div class="card">
                            <div class="d-flex justify-content-center">
                                <img class="card-img-top img-fluid m-1" src="../<?php //echo $alq->getImagen(); 
                                                                                ?>" style="max-height: 220px; width: auto;" alt="Card image">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php //echo $alq->getNombreJuego();  
                                                        ?></h4>
                                <!-- <p class="card-text"><?php //echo $juego->getCodigo(); 
                                                            ?></p> -->
                                <input type="submit" value="Ver Juego" class="btn btn-primary ">
                                <!-- <a href="#" class="btn btn-primary">Ver juego</a> -->
                            </div>
                        </div>
                    </form>
                </div>
<?php
            }
        }
    }
}
