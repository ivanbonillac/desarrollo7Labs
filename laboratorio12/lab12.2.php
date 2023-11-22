<?PHP
    session_start();
?>

<HTML LANG="es">
<HEAD>
<TITLE>Laboratorio 12</TITLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css"> -</HEAD>
<BODY>
<H1>Manejo de sesiones</H1>
<H2>Paso 2: se accede a la variable de sesion almacenada y se destruye</H2> <?PHP
    if (isset($_SESSION['var'])){
        $var = $_SESSION['var'];
        print ("<P>Valor de la variable de sesion: $var</P>\n");
        unset ($_SESSION['var']);
        print ("<A HREF='lab12.3.php'>Paso 3</A>");
    }else{
        print ("Sesion no iniciada, ir al <A HREF='lab12.1.php'>paso 1</A> para iniciar la sesion");
    }
?>
</BODY>
</HTML>