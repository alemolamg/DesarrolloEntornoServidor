<?php
require_once '../Controllers/Conexion.php';
require_once '../Models/Juego.php';
class JuegoController
{
    /**
     * Recupera un juego dado su código
     */
    public static function recuperarJuego($cod)
    {
        $sql = "SELECT * FROM juegos WHERE codigo = '$cod'";
        $conex = new Conexion();
        $result = $conex->query($sql);
        if ($conex->errorCode() != 0) {
            print_r($conex->errorInfo());
            die("ERROR");
        }

        if ($result->rowCount()) {
            $juego = new Juego('Juego Beta', "PC", 5, "kk.jpg");
            while ($fila = $result->fetch()) {
                $juego->nuevoJuego(
                    $fila->Codigo,
                    $fila->Nombre_juego,
                    $fila->Nombre_consola,
                    $fila->Anno,
                    $fila->Precio,
                    $fila->Alquilado,
                    $fila->Imagen,
                    $fila->descripcion
                );
            }
            return $juego;
        } else {
            return FALSE;
        }
    }

    public static function recuperarTodos()
    {
        $sql = "SELECT * FROM juegos ORDER BY codigo";
        $conex = new Conexion();
        $result = $conex->query($sql);
        if ($conex->errorCode() != 0) {
            print_r($conex->errorInfo());
            die("ERROR");
        }

        if ($result->rowCount()) {
            $j = new Juego('Juego Beta', "PC", 5, "kk.jpg");
            while ($fila = $result->fetch()) {
                $j->nuevoJuego(
                    $fila->Codigo,
                    $fila->Nombre_juego,
                    $fila->Nombre_consola,
                    $fila->Anno,
                    $fila->Precio,
                    $fila->Alquilado,
                    $fila->Imagen,
                    $fila->descripcion
                );
                $listaJuegos[] = clone ($j);
            }
            return $listaJuegos;
        } else {
            return FALSE;
        }
    }

    public static function mostrarJuegosPantalla()
    {
        $juegos = self::recuperarTodos();
        if ($juegos == FALSE) {
            echo "Error al extraer los datos";
        } else {
            $contador = 0;
            foreach ($juegos as $juego) {
?>
                <div class="col-lg-3 col-8 my-2">
                    <form action="../View/vistaJuego.php" method="post">
                        <input type="hidden" name="codJuego" value="<?php echo $juego->getCodigo(); ?>">
                        <div class="card" style="cursor: pointer" onclick="location.href='#'">
                            <div class="d-flex justify-content-center">
                                <img class="card-img-top img-fluid m-1" src="../<?php echo $juego->getImagen(); ?>" style="max-height: 220px; width: auto;" alt="Card image">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $juego->getNombreJuego();  ?></h4>
                                <p class="card-text"><?php echo $juego->getCodigo(); ?></p>
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
