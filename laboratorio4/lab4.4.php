<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.4</title>
</head>
<body>
    <h1>Llenar Arreglo con Números Pares</h1>

    <form method="POST" action="lab4.4.php">
        <label for="numero">Ingrese un número par:</label>
        <input type="number" id="numero" name="num" required>
        <input type="submit" value="Agregar número">
    </form>
    <?php
        // Verifica si se ha enviado una solicitud POST
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Convierte el valor del campo "num" en un número entero
            $numero = intval($_POST["num"]);

            // Comprueba si el número ingresado es par
            if ($numero % 2 == 0) {
                // Inicia o reanuda la sesión
                session_start();

                // Si no existe un arreglo en la sesión, créalo
                if (!isset($_SESSION["numeros_pares"])) {
                    $_SESSION["numeros_pares"] = array();
                }

                // Verifica si el arreglo no contiene más de 10 elementos antes de agregar el número par
                if (count($_SESSION["numeros_pares"]) < 10) {
                    // Agrega el número par al arreglo en la sesión
                    $_SESSION["numeros_pares"][] = $numero;
                } else {
                    // Muestra un mensaje si ya hay 10 elementos en el arreglo
                    echo "Ya ha ingresado 10 números pares. No se pueden ingresar más.";
                }
            } else {
                // Muestra un mensaje si el número ingresado no es par
                echo "El número ingresado no es par. Por favor, ingrese un número par.";
            }
        }

        // Si existen elementos en el arreglo de números pares en la sesión, muéstralos
        if (isset($_SESSION["numeros_pares"]) && count($_SESSION["numeros_pares"]) > 0) {
            echo "<h2>Arreglo de números pares ingresados:</h2>";
            echo "<pre>";
            print_r($_SESSION["numeros_pares"]);
            echo "</pre>";
        }
    ?>
</body>
</html>