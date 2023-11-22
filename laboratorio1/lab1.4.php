<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 1.4</title>
</head>
<body>
    <?php
        echo "<table border = 1";
        $n=1;
        for ($n1=1; $n1 <= 10 ; $n1++) { 
            echo "<tr>";
            for ($n2=1; $n2 <=10 ; $n2++) { 
                echo "<td>", $n, "</td>";
                $n=$n+1;
            }
            echo "</tr>";
        }
    echo "</table>"    
    ?>
</body>
</html>