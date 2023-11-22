<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 10.2</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Encuesta. Resultados de la votacion</h1>
    <?php

        require_once("class/votos.php");

        $obj_votos = new votos();
        $result_votos = $obj_votos->listarVotos();
        foreach ($result_votos as $result_voto) { 
            $votos1=$result_voto['votos1'];
            $votos2=$result_voto['votos2'];
        }
        $totalVotos = $votos1 + $votos2;
        print ("<TABLE>\n");
        print ("<TR>\n");
        print ("<TH>Respuesta</TH>\n");
        print ("<TH>Votos</TH>\n");
        print ("<TH>Porcentaje</TH>\n");
        print ("<TH>Representacion grafica</TH>\n");
        print ("</TR>\n");
        $porcentaje = round(($votos1/$totalVotos) *100,2);
        print ("<TR>\n");
        print ("<TD CLASS='izquierda'>Si</TD>\n") ;
        print ("<TD CLASS=' derecha '>$votos1</TD>\n");
        print ("<TD CLASS=' derecha '>$porcentaje\</TD>\n");
        print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".
         $porcentaje*4 ."'></TD>\n");
        print ("</TR>\n");
        $porcentaje = round(($votos2 / $totalVotos )*100,2);
        print("<TR>");
        print("<TD CLASS='izquierda'>No</TD>\n");
        print("<TD CLASS='derecha'>$votos2</TD>\n");
        print("<TD CLASS='derecha'>$porcentaje%</TD>\n");
        print("<TD CLASS='izquierda'WIDTH='400'><IMG SRC='img/puntoamarillo.gif'HEIGHT='10' WIDTH='".$porcentaje*4 . "'></TD>\n");
        print("<TR>\n");

        print ("</TABLE>\n");
        print ("<P>Numero total de votos emitidos: $totalVotos </P>\n");
        print ("<P><A HREF='lab10.1.php'>Pagina de votacion</A></P>\n");
    ?>
</body>
</html>