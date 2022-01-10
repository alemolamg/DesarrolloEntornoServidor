<?php
require_once 'Conexion.php'; //TODO: Cambiar si falla la conexión
require_once '../Models/Animal.php';

class AnimalController
{
    /**
     * Función que devuelve el último código usado de un animal
     */
    public static function getUltimoCodigo()
    {
        $sql = "SELECT codigo FROM animal ORDER BY codigo DESC";
        $conex = new Conexion();
        $result = $conex->query($sql);
        if ($conex->errorCode() != 0) {
            print_r($conex->errorInfo());
            die("ERROR");
        }

        if ($result->rowCount()) {
            $fila = $result->fetch();
            return $fila->codigo;
        }
    }

    /**
     * Calcula la lista de animales de cada responsable.
     * @param String $codRes Codigo del responsable.
     * @return Array $result Devuelve una lista de animales.
     */
    public static function misAnimales($codRes)
    {
        $sql = "SELECT * FROM animal WHERE dni_responsable = '$codRes'";
        $conex = new Conexion();
        $result = $conex->query($sql);
        if ($conex->errorCode() != 0) {
            print_r($conex->errorInfo());
            die("ERROR");
        }

        if ($result->rowCount()) {
            $ani = new Animal(0, "beta", "Descono", "hembra", "0-0-0000", "España", "Europa", "11111111A", "imagen/beta");
            while ($fila = $result->fetch()) {
                $ani = new Animal(
                    $fila->codigo,
                    $fila->tipo,
                    $fila->especie,
                    $fila->sexo,
                    $fila->ano_nac,
                    $fila->pais_origen,
                    $fila->continente,
                    $fila->dni_responsable,
                    $fila->ruta
                );
                $listaAnimales[] = clone ($ani);
            }
            return $listaAnimales;
        } else {
            return FALSE;
        }
    }

    public static function aniadirAnimal($codAni, $tipoAni, $especie, $sexo, $anioNac, $pais, $conti, $img, $codJaula)
    {
        $sqlAni = "INSERT INTO animal VALUES ($codAni,$tipoAni,$especie,$sexo,$anioNac,$pais,$conti," . $_SESSION['dni'] . ",$img)";
        $conex = new Conexion();
        if ($conex->exec($sqlAni) == 0) {
            $ok = false;
        }

        if ($ok) {
            $conex->commit();
        } else {
            echo $conex->errorInfo();
            $conex->rollBack();
        }
    }

    /**
     * Muestra una tabla con todos los animales que dependen del responsable actual
     */
    public static function mostrarTablaAnimales()
    {
        $listaAni = self::misAnimales($_SESSION['dni']);
        if ($listaAni == FALSE) {
            echo "Error al extraer los datos";
        } else {
            //$contador = 0;
?>
            <!-- <div class="col-md-4 col-lg-3 col-8 my-2"> -->
            <table class='table table-striped bg-light mt-3'>
                <tr>
                    <th>img</th>
                    <th>Tipo</th>
                    <th>Especie</th>
                    <th>Sexo</th>
                    <th>Año Nacimiento</th>
                    <th>Pais</th>
                    <th>Continente</th>
                    <th>Historial</th>
                </tr>
                <?php
                foreach ($listaAni as $animal) {
                    echo "<tr>";
                    echo "<td><img src='../" . $animal->getImagen() . "'  width='45px'/>" . "</td>"; // img
                    //echo "<td>" . $animal->getImagen() . "</td>";
                    echo "<td>" . $animal->getTipo() . "</td>";
                    echo "<td>" . $animal->getEspecie() . "</td>";
                    echo "<td>" . $animal->getSexo() . "</td>";
                    echo "<td>" . $animal->getFechaNac() . "</td>";
                    echo "<td>" . $animal->getPaisOrigen() . "</td>";
                    echo "<td>" . $animal->getContinente() . "</td>";
                    echo "<td>" . '<form action="" method="post">
                                            <input type="hidden" name="codAnimal" value="' . $animal->getCodigo() . '"  >
                                            <input type="hidden" name="tipoAnimal" value="' . $animal->getTipo() . '"  >
                                            <input type="submit" value="Ver Historial" name="verHistorial" class="btn btn-success">
                                        </form>' . "</td>"; //btn historial
                    echo "<tr>";
                }
                ?>
            </table>
            </div>
<?php

        }
    }
}
