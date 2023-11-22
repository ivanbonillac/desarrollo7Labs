<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.5</title>
</head>

<body>
    <h1>Generador de Matriz Identidad</h1>
    <form method="post" action="lab4.5.php">
        Ingrese un número par N: <input type="number" name="n" min="2" step="2" required>
        <input type="submit" value="Generar Matriz">
    </form>
    <?php
    // Verifica si se ha enviado el formulario (POST request)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtiene el valor de N ingresado por el usuario desde el formulario
        $n = $_POST["n"];

        // Verifica si N es un número par
        if ($n % 2 == 0) {
            // Imprime el encabezado con el orden de la matriz identidad
            echo "<h2>Matriz Identidad de orden $n:</h2>";

            // Inicia la tabla HTML para mostrar la matriz
            echo "<table border='1'>";

            // Recorre las filas de la matriz
            for ($i = 0; $i < $n; $i++) {
                echo "<tr>";

                // Recorre las columnas de la matriz
                for ($j = 0; $j < $n; $j++) {
                    // Si la posición actual es parte de la diagonal principal, coloca un 1
                    if ($i == $j) {
                        echo "<td>1</td>";
                    } else {
                        // De lo contrario, coloca un 0
                        echo "<td>0</td>";
                    }
                }

                // Cierra la fila actual de la tabla
                echo "</tr>";
            }

            // Cierra la tabla
            echo "</table>";
        } else {
            // Si N no es par, muestra un mensaje de error
            echo "<p>El número ingresado no es par. Por favor, ingrese un número par.</p>";
        }
    }
    ?>
</body>

</html>