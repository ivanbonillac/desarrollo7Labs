
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 11.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>Consulta de noticias</h1>
    <?php
    require_once("class/noticias.php");

    $obj_noticia = new noticia();
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    $noticiasPorPagina = 5;

    $obj_noticia = new noticia();
    $offset = ($pagina - 1) * $noticiasPorPagina;
    $noticias = $obj_noticia->consultarNoticiasPaginadas($noticiasPorPagina, $offset);

    $nfilas = count($noticias);

    // Obtén el número total de noticias en la base de datos
    $totalNoticias = 7; // Reemplaza esto con la forma en que obtienes el total de noticias

    // Calcula el número total de páginas
    $totalPaginas = ceil($totalNoticias / $noticiasPorPagina);

    // Asegura que la página esté dentro de los límites
    $pagina = max(1, min($pagina, $totalPaginas));

    // Calcula el rango de noticias que se están mostrando
    $inicio = ($pagina - 1) * $noticiasPorPagina + 1;
    $fin = min($inicio + $noticiasPorPagina - 1, $totalNoticias);

    // Muestra el mensaje con el rango
    echo "Mostrando noticias del $inicio al $fin de un total de $totalNoticias noticias. ";

    // Enlaces "Anterior" y "Siguiente" en el formato deseado
    echo "[ ";
    if ($pagina > 1) {
        echo "<a href='?pagina=" . ($pagina - 1) . "'>Anterior</a>";
    } else {
        echo "Anterior";
    }
    echo " | ";
    if ($pagina < $totalPaginas) {
        echo "<a href='?pagina=" . ($pagina + 1) . "'>Siguiente</a>";
    } else {
        echo "Siguiente";
    }
    echo " ]";

    // Tabla de noticias
    print("<TABLE>\n");
    print("<TR>\n");
    print("<TH>Titulo</TH>\n");
    print("<TH>Texto</TH>\n");
    print("<TH>Categoria</TH>\n");
    print("<TH>Fecha</TH>\n");
    print("<TH>Imagen</TH>\n");
    print("</TR>\n");

    foreach ($noticias as $resultado) {
        print("<TR>\n");
        print("<TD>" . $resultado['titulo'] . "</TD>\n");
        print("<TD>" . $resultado['texto'] . "</TD>\n");
        print("<TD>" . $resultado['categoria'] . "</TD>\n");
        print("<TD>" . date("j/n/Y", strtotime($resultado['fecha'])) . "</TD>\n");

        if ($resultado['imagen'] != "") {
            print("<TD><A TARGET='_black' HREF='img/" . $resultado['imagen'] . "'>
            <IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
        } else {
            print("<TD>&nbsp;</TD>\n");
        }
        print("</TR>\n");
    }
    print("</TABLE>\n");
    ?>   
</body>
</html>

