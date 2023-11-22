<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 20</title>
</head>
<body>
    <form action="Lab20.1.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email"><br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" min="0" max="120"><br><br>
        <input type="submit" name="guardar" value="Guardar datos">
    </form>
    <?php
        include("UsuariosMDB.php");
        $usrs = new UsuariosMDB();

        if (array_key_exists('guardar', $_POST)) {
            $usrs->insertarRegistro($_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['email'], $_REQUEST['edad']);
            echo "Registro insertado exitosamente <br><br>";
        }
        echo "Registros en la colección usuarios: <br>";
        $usrs->obtenerRegistro();
    ?>
</body>
</html>