<HTML LANG="es">
<HEAD>
    <TITLE>Laboratorio 13</TITLE>
    <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css"> 
</HEAD>
<BODY>
<H1>Recuperar valor de una Cookie</H1>
<?php
if
(isset($_COOKIE ["user"]))
echo "<H2>Bienvenido ".$_COOKIE ["user"]."!</H2><br/>"; else
echo
"<H2>Bienvenido invitado!</H2><br/>";
?>
<A HREF="lab13.1.php">...Regresar</A>&nbsp;
<A HREF="lab13.4.php">Continuar...</A>
</BODY>
</HTML>