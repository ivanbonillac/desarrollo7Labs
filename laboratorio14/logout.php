<?php
    session_start();
?>
<html lang="es">
<head>
    <title>Desconectar</title>
    <link REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</head>

<?php
 if (isset($_SESSION["usuario_valido"]))
 {
    sesion_destroy ();
    print ("<BR><BR><P ALIGN='CENTER'>Conexion finalizada</P>\n");
    print ("<P ALIGN='CENTER'>[ <A HREF='login.php'>Conectar</A> ]</P>\n");
 }
 else
 {
    print ("<BR><BR>\n");
    print ("<P ALIGN='CENTER'>No existe una conexion activa</P>\n");
    print ("<P ALIGN='CENTER'>[ <A HREF='login.php'>Conectar</A> ]</P>\n");
 }
?>
</body>
</html>