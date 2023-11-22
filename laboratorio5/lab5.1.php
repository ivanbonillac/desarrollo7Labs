<?php
if (is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'])) {
    $nombreDirectorio = "archivos/";
    $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
    $nombreCompleto = $nombreDirectorio . $nombrearchivo;

    if (is_file($nombreCompleto)) {
        $idUnico = time();
        $nombrearchivo = $idUnico . "-" . $nombrearchivo;
        echo "Archivo repetido, se cambiará el nombre a $nombrearchivo <br><br>";
    }

    // Asegurarse de que el directorio exista o crearlo si no existe
    if (!is_dir($nombreDirectorio)) {
        mkdir($nombreDirectorio, 0755, true);
    }

    // Mover el archivo subido al directorio "archivos"
    if (move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio . $nombrearchivo)) {
        echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio <br>";
    } else {
        echo "Error al mover el archivo al directorio $nombreDirectorio <br>";
    }
} else {
    echo "No se ha podido subir el archivo <br>";
}
?>
