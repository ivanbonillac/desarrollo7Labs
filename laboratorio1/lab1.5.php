<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 1.5</title>
</head>
<body>
    <?php
        define ('TAM', 10);
         echo "<table border = 1";
         $n=1;
         for ($n1=1; $n1 <= TAM ; $n1++) { 
            // $retVal = ($n1 % 2==0)? "<tr bgcolor=#bdc3d6>":"<tr>";
            // echo "$retVal";
            if($n1 % 2==0) 
                echo "<tr bgcolor=#bdc3d6>" ;
            else 
                echo"<tr>" ;
            for ($n2=1; $n2 <=TAM ; $n2++) { 
                echo "<td>", $n, "</td>";
                $n=$n+1;
            }
            echo "</tr>";
         }
     echo "</table>"    
    ?>
</body>
</html>