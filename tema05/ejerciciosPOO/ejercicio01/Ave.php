<?php
require_once 'Animal.php';
class Ave extends Animal
{
    const IMG = './images/aguila.jpg';
    public $terrestre = false; //True si lo son, false si no.
    public $nombre;

    function __construct($nombre, $esp, $alimentacion, $imagen = Ave::IMG)
    {
        $this->nombre = $nombre;
        $this->especie = $esp;
        $this->numPatas = 2;
        $this->alimentacion = $alimentacion;
        $this->terrestre = false;
        $this->imagen = $imagen;
    }

    function __toString()
    {
        return "Especie: " . $this->especie . " ,Alimentación: " . $this->alimentacion .
            " ,Nº Patas: $this->numPatas " . " ,Terrestre: " . $this->terrestre;
    }

    function volar()
    {
        $video = 'https://www.youtube.com/watch?v=CFPQJULtjBQ';
        return $video;
    }

    function darFunciones()
    {
?>
        <form action="" method="post">
            <input type="hidden" name="video" value="<?php echo $this->volar(); ?>">
            <input type="hidden" name="Ave">
            <button name="audio">Reproducir audio </button>
        </form>
<?php
    }
}
