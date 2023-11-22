<?php
class NumerosPares
{
    public function __construct()
    {
        // Inicia o reanuda la sesión
        session_start();

        // Si no existe un arreglo en la sesión, créalo
        if (!isset($_SESSION["numeros_pares"])) {
            $_SESSION["numeros_pares"] = array();
        }
    }

    public function agregarNumeroPar($numero)
    {
        // Convierte el valor en un número entero
        $numero = intval($numero);

        // Comprueba si el número ingresado es par
        if ($numero % 2 == 0) {
            // Verifica si el arreglo no contiene más de 10 elementos antes de agregar el número par
            if (count($_SESSION["numeros_pares"]) < 10) {
                // Agrega el número par al arreglo en la sesión
                $_SESSION["numeros_pares"][] = $numero;
            } else {
                // Muestra un mensaje si ya hay 10 elementos en el arreglo
                echo "Ya ha ingresado 10 números pares. El arreglo se ha reiniciado.";
                // Limpia el arreglo para comenzar de nuevo
                $_SESSION["numeros_pares"] = array();
            }
        } else {
            // Muestra un mensaje si el número ingresado no es par
            echo "El número ingresado no es par. Por favor, ingrese un número par.";
        }
    }

    public function mostrarArreglo()
    {
        // Si existen elementos en el arreglo de números pares en la sesión, muéstralos
        if (isset($_SESSION["numeros_pares"]) && count($_SESSION["numeros_pares"]) > 0) {
            echo "<h2>Arreglo de números pares ingresados:</h2>";
            echo "<pre>";
            print_r($_SESSION["numeros_pares"]);
            echo "</pre>";
        }
    }
}

$numerosParesObj = new NumerosPares();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["num"])) {
    $numero = $_POST["num"];
    $numerosParesObj->agregarNumeroPar($numero);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.4</title>
</head>
<body>
    <h1>Llenar Arreglo con Números Pares</h1>

    <form method="POST" action="lab8.2.php">
        <label for="numero">Ingrese un número par:</label>
        <input type="number" id="numero" name="num" required>
        <input type="submit" value="Agregar número">
    </form>

    <?php
    $numerosParesObj->mostrarArreglo();
    ?>
</body>
</html>
