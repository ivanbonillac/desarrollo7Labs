<?php
    // Establecer el límite máximo para subir archivos a 1MB (1024 * 1024 bytes)
    $maxFileSize = 1024 * 1024; // 1MB

    if (is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'])) {
        $nombreDirectorio = "archivos/";
        $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
        $nombreCompleto = $nombreDirectorio . $nombrearchivo;

        // Obtener la extensión del archivo
        $extension = strtolower(pathinfo($nombrearchivo, PATHINFO_EXTENSION));

        // Verificar el tamaño del archivo
        if ($_FILES['nombre_archivo_cliente']['size'] <= $maxFileSize) {
            // Verificar si la extensión es válida
            $extensionesValidas = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension, $extensionesValidas)) {
                if (is_file($nombreCompleto)) {
                    $idUnico = time();
                    $nombrearchivo = $idUnico . "-" . $nombrearchivo;
                    echo "Archivo repetido, se cambiará el nombre a $nombrearchivo <br><br>";
                }

                move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio . $nombrearchivo);

                echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio <br>";
            } else {
                echo "El archivo no es una imagen válida. Sube archivos en formato jpg, jpeg, gif o png. <br>";
            }
        } else {
            echo "El archivo excede el tamaño máximo permitido de 1MB. <br>";
        }
    } else {
        echo "No se ha podido subir el archivo <br>";
    }
?>
