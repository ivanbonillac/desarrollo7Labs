<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.2</title>
</head>
<body>
<h1>Calcular de Factorial</h1>
    
    <form method="POST" action="lab4.2.php">
        <label for="numero">Ingrese un número:</label>
        <input type="number" id="numero" name="num" required>
        <input type="submit" value="Calcular">
    </form>
    <?php
    if(isset($_REQUEST['num'])){
        $numero = $_POST['num'];
        $factorial = 1;
        for($i = 1; $i<=$numero; $i++){
            $factorial = $factorial  * $i;
        }
        echo "<br/> El factorial de ".$numero." es : ".$factorial;
    }
?>
</body>
</html>