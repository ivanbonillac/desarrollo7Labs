<!DOCTYPE html>
<html>
<head>
    <title>Laboratorio 7.7</title>
    <meta charset="utf-8">
</head>
<body>
<?php
class Cilindro
{
    protected $pi;
    protected $diametro;
    protected $altura;
    protected $radio;

    function __construct($d, $a)
    {
        $this->diametro = $d;
        $this->altura = $a;
        $this->pi = 3.141593;
        $this->radio = $d / 2;
    }

    function obtener_radio()
    {
        return $this->radio;
    }

    function calc_volumen()
    {
        return $this->pi * $this->radio * $this->radio * $this->altura;
    }

    function calc_area()
    {
        return 2 * $this->pi * $this->radio * ($this->radio + $this->altura);
    }
}

if (array_key_exists('enviar', $_POST)) {
    $diam = $_POST['diam'];
    $altu = $_POST['altu'];
    $cil = new Cilindro($diam, $altu);
    $volumen = $cil->calc_volumen();
    $area = $cil->calc_area();
    echo "<br/> El volumen del cilindro es de " . $volumen . " metros cubicos";
    echo "<br/> El área del cilindro es de " . $area . " metros cuadrados";
} else {
?>
    <form name="formularioDatos" method="post" action="Lab7.7.php">
        <p> CALCULO DE VOLUMEN y AREA DE UN CILINDRO </p>
        <br/>
        Introduzca el diámetro en metros: <input type="text" name="diam" value="">
        <br/> <br/>
        Introduzca la altura en metros: <input type="text" name="altu" value="">
        <br/> <br/>
        <input value="Calcular" name="enviar" type="submit" />
    </form>
<?php
}
?>
</body>
</html>
