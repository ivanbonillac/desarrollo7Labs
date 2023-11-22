<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.3</title>
</head>
<body>
    <h1>Mayor elemento del arreglo</h1>

    <?php
    // llenar un arreglo unidimension de 20 elementos y mostrar la posicion y el valor del elemento mayor   
        function generarArreglo(){
            $arr=array();
            for ($i=0; $i <20 ; $i++) { 
                do {
                    $num = rand(1, 100);
                } while (in_array($num, $arr));
                    $arr[$i] = $num;
            }
            return $arr;       
        } 
        // Función para encontrar la posición y el valor del elemento mayor en el arreglo
        function encontrarElementoMayor($arr) {
            $maxValor = max($arr);
            $maxPosicion = array_search($maxValor, $arr);
            return array($maxPosicion, $maxValor);
        }

        // Generar el arreglo sin repeticiones
        $arreglo = generarArreglo();
        list($posicionMax, $valorMax) = encontrarElementoMayor($arreglo);

        // Mostrar el arreglo y el valor máximo
        echo "Arreglo: [", implode(", ", $arreglo), "] <br>";
        echo " Posición del valor máximo: $posicionMax <br>";
        echo " Valor máximo: $valorMax";   
    ?>
</body>
</html>