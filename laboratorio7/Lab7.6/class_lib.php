<?php
class Cilindro
{
    protected $pi;
    protected $diametro;
    protected $altura;
    protected $radio;

    function __construct($d, $a){
        $this->diametro = $d;
        $this->altura = $a; 
        $this->pi = 3.141593;
        $this->radio = $d / 2;
    }

    function obtener_radio(){
        return $this->radio;
    }

    function calc_volumen(){
        return $this->pi * $this->radio * $this->radio * $this->altura;
    }

    function calc_area(){
        return 2 * $this->pi * $this->radio * ($this->radio + $this->altura);
    }
}
?>
