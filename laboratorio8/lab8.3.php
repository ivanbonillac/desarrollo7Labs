<?php

class MatrizIdentidadGenerator
{
    private $n;

    public function __construct($n)
    {
        $this->n = $n;
    }

    public function generarMatrizIdentidad()
    {
        if ($this->n % 2 == 0) {
            echo "<h2>Matriz Identidad de orden $this->n:</h2>";
            echo "<table border='1'>";

            for ($i = 0; $i < $this->n; $i++) {
                echo "<tr>";

                for ($j = 0; $j < $this->n; $j++) {
                    if ($i == $j) {
                        echo "<td>1</td>";
                    } else {
                        echo "<td>0</td>";
                    }
                }

                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>El número ingresado no es par. Por favor, ingrese un número par.</p>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["n"])) {
    $n = intval($_POST["n"]);
    $matrizIdentidadGenerator = new MatrizIdentidadGenerator($n);
    $matrizIdentidadGenerator->generarMatrizIdentidad();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.5</title>
</head>

<body>
    <h1>Generador de Matriz Identidad</h1>
    <form method="post" action="lab8.3.php">
        Ingrese un número par N: <input type="number" name="n" min="2" step="2" required>
        <input type="submit" value="Generar Matriz">
    </form>
</body>

</html>
