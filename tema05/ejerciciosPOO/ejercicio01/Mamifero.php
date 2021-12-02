<?php
require_once 'Animal.php';
class Mamifero extends Animal
{
    const IMG = 'https://estaticos.muyinteresante.es/media/cache/1000x_thumb/uploads/images/test/57fccea55bafe8b4058b4569/mamiferos2.jpg';
    public $terrestre = true; //True si lo son, false si no.
    const AUDIO = "./sounds/sonidoPerro.mp3";
    function __construct($esp, $numPatas, $alimentacion, $imagen = Mamifero::IMG)
    {
        $this->especie = $esp;
        $this->numPatas = $numPatas;
        $this->alimentacion = $alimentacion;
        $this->terrestre = true;
        $this->imagen = $imagen;
    }

    function __toString()
    {
        return "Especie: " . $this->especie . " ,Alimentación: " . $this->alimentacion .
            " ,Nº Patas: $this->numPatas " . " ,Terrestre: " . $this->terrestre;
    }

    function darFunciones()
    {
?>
        <form action="" method="post">
            <input type="hidden" name="video" value="<?php ?>">
            <input type="hidden" value="Mamifero">
            <input type="hidden" value="<?php echo self::AUDIO; ?>">
            <button name="audio">Reproducir audio </button>
        </form>
<?php
    }
}

?>