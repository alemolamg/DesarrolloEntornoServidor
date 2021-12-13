<?php
require_once '../Controllers/Conexion.php';
require_once '../Models/Juego.php';
class JuegoController
{
    private static function recuperarTodos()
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
                    $fila->Imagen
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
                <div class="col-lg-4 col-8">
                    <div class="card">
                        <div class="d-flex justify-content-center">
                            <img class="card-img-top" src="../<?php echo $juego->getImagen(); ?>" style="max-width: 300px;" alt="Card image">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $juego->getNombreJuego();  ?></h4>
                            <p class="card-text"><?php echo $juego->getImagen(); ?></p>
                            <a href="#" class="btn btn-primary">Ver juego</a>
                        </div>
                    </div>
                </div>
<?php
            }
        }
    }
}
