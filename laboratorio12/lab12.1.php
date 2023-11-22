<?php
    session_start();
?>
<HTML_XMLNS="http://www.w3.org/1999/xhtml" xml:lang="es" LANG="es">
    <HEAD>
        <TITLE>Laboratorio 12</TITLE>
        <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css"> 
    </HEAD>
    <BODY>
        <H1>Manejo de sesiones</H1>
        <H2>Paso 1: se crea la variable de sesion y se almacena</H2> 
        <?PHP
            $var="Ejemplo Sesiones";
            $_SESSION['var'] = $var;
            print ("<P>Valor de la variable de sesion: $var</P>\n");
        ?>
   
    <A HREF="lab12.2.php">Paso 2</A>
    </BODY> 
</HTML>