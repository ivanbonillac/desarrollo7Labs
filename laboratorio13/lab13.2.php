<?php
    if (array_key_exists('enviar', $_POST)) {
    $expire=time () +60*5;
    setcookie ("user", $_REQUEST['visitante'], $expire);
    header("Refresh:0");
    }
?>
<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 13</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css"> </HEAD>
<BODY>
<H1>Creación de Cookies</H1>
<H2>La coockie "User" tendrá solo 5 minutos de duración</H2>

<?php
    if(isset($_COOKIE ["user"])) {
    print("<BR/>Hola <B>".$_COOKIE ["user"]."</B> gracias por visitar nuestro sitio web<BR/>");
    }else{
?>
    <FORM NAME="formcookie" METHOD="post" ACTION="lab13.2.php">
    <BR/>Hola, primera vez que te vemos por nuestro sitio web ¿Como te llamas?
    <INPUT TYPE="text" NAME="visitante">
    <INPUT NAME="enviar" VALUE="Gracias por intentificate" TYPE="submit" /><BR/> 
<?PHP
    }
?>
<BR/><A HREF="lab13.3.php" >Continuar...</A>
-</BODY> -</HTML>