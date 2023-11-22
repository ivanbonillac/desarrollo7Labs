<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 10.1</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
        require_once("class/votos.php");

        if(array_key_exists('enviar', $_POST)){
            print("<H1>Encuesta. voto registrado </H1>\n");
            $obj_votos= new votos();
            $result_votos = $obj_votos->listarVotos();

            foreach($result_votos as $result_voto){
                $votos1=$result_voto['votos1'];
                $votos2=$result_voto['votos2'];
            }
            $voto=$_REQUEST['voto'];
            if($voto == "si")
                $votos1=$votos1+1;
            else if($voto=="no")
                $votos2 = $votos2 +1;
            
                $obj_votos= new votos();
                $result= $obj_votos->actualizarVotos($votos1, $votos2);
            if($result){
                print("<p> Su voto ha sido registrado. Gracias por su participar </p>\n");
                print("<a href='lab10.2.php'>ver resultado</a>\n");
            }else{
                print("<a href='lab10.1.php'> Error al actualizar su voto</a>\n");
            }
        }
    ?>
    <!-- Formulario para el registro de los datos del usuario -->
    <h1>Encuesta</h1>
    <p>¿Cree ud. que el precio de la vivienda seguira subiendo al ritmo actual?</p>
    <form action="Lab10.1.php" method ="post">
        <input type="radio" name="voto" value="si" checked>Si<br>
        <input type="radio" name="voto" value="no">No<br><br>
        <input type="submit" value="votar" name="enviar">
    </form>
    <a href="lab10.2.php">Ver resultados</a>
</body>
</html>