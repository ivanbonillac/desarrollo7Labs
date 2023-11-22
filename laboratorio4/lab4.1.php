<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.1</title>
</head>
<body>
    <form action="lab4.1.php" method="post">
        <h3>Indique cual es el porcentaje de sus ventas del 0% a 100%</h3>
        <input type="number" name="valor" required>
        <input type="submit" value="Mostrar Desempeño" name="porcentaje">
    </form>
    <?php 
    if(array_key_exists('valor', $_POST)){
        if($_REQUEST['valor'] >= 80){
            echo "El porcentaje de desempeño ingresado es: $_REQUEST[valor]%";
            echo "<br><img src="."assets/happy.png"." alt=".">";
        }elseif($_REQUEST['valor'] >= 50){
            echo "El porcentaje de desempeño ingresado es: $_REQUEST[valor]%";
            echo "<br><img src="."assets/middle.png"." alt=".">";
        }else{
            echo "El porcentaje de desempeño ingresado es: $_REQUEST[valor]%";
            echo "<br><img src="."assets/sad.png"." alt=".">";
        }
    }
?>
</body>
</html>
