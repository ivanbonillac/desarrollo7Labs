<?php

class Arreglo
{
    private $arr;

    public function __construct()
    {
        $this->arr = $this->generarArreglo();
    }

    private function generarArreglo()
    {
        $arr = array();
        for ($i = 0; $i < 20; $i++) {
            do {
                $num = rand(1, 100);
            } while (in_array($num, $arr));
            $arr[$i] = $num;
        }
        return $arr;
    }

    public function encontrarElementoMayor()
    {
        $maxValor = max($this->arr);
        $maxPosicion = array_search($maxValor, $this->arr);
        return array($maxPosicion, $maxValor);
    }

    public function mostrarArreglo()
    {
        return implode(", ", $this->arr);
    }
}

$arregloObj = new Arreglo();
list($posicionMax, $valorMax) = $arregloObj->encontrarElementoMayor();

echo "Arreglo: [", $arregloObj->mostrarArreglo(), "] <br>";
echo "Posición del valor máximo: $posicionMax <br>";
echo "Valor máximo: $valorMax";
?>
