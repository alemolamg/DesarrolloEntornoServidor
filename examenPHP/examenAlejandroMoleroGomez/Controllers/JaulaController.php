<?php
require_once "Conexion.php";
require_once "../Models/Jaula.php";

class JaulaController
{

    public static function allJaulas()
    {
        $sql = "SELECT * FROM jaula";
        $conex = new Conexion();
        $result = $conex->query($sql);
        if ($conex->errorCode() != 0) {
            print_r($conex->errorInfo());
            die("ERROR");
        }
        if ($result->rowCount()) {
            while ($fila = $result->fetch()) {
                $jau = new Jaula(
                    $fila->codigo,
                    $fila->tipo,
                    $fila->caracteristicas,
                    $fila->ubicacion
                );
                $Listajaulas[] = $jau;
            }
            return $Listajaulas;
        }
    }

    public static function cargarHistorial($codAnimal)
    {
        $sql = "SELECT jau.codigo, jau.tipo, jau.caracteristicas, jau.ubicacion, aj.fecha_ingreso,aj.fecha_salida " .
            " FROM jaula jau, animal_jaula aj WHERE aj.codigo_animal = $codAnimal AND jau.codigo = aj.codigo_jaula ORDER BY 1;";
        $conex = new Conexion();
        $result = $conex->query($sql);
        if ($conex->errorCode() != 0) {
            print_r($conex->errorInfo());
            die("ERROR");
        }
        if ($result->rowCount()) {
?>
            <div id="tabla">
                <table class='table table-striped bg-light mt-3'>
                    <tr>
                        <th>Codigo</th>
                        <th>Tipo</th>
                        <th>Características</th>
                        <th>Ubicación</th>
                        <th>Fecha Ingreso</th>
                        <th>Fecha Salida</th>
                    </tr>

                    <?php
                    while ($fila = $result->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $fila->codigo . "</td>";
                        echo "<td>" . $fila->tipo . "</td>";
                        echo "<td>" . $fila->caracteristicas . "</td>";
                        echo "<td>" . $fila->ubicacion . "</td>";
                        echo "<td>" . $fila->fecha_ingreso . "</td>";
                        echo "<td>" . $fila->fecha_salida . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
<?php

        }
    }
}

?>