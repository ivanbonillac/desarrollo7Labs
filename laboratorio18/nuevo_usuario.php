<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Laboratorio 18</title>
</head>
<body>
    <h1>Registro de Nuevo Usuario</h1>
    <form action="nuevo_usuario.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required>
        <span id="nombre-error" class="error-message"></span><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" required>
        <span id="apellido-error" class="error-message"></span><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required pattern="^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$">
        <span id="email-error" class="error-message"></span><br><br>

        <label for="contraseña">Contraseña:</label><br>
        <input type="password" id="contraseña" name="contraseña" required pattern="^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$">
        <span id="contraseña-error" class="error-message"></span><br><br>

        <label for="rep_contraseña">Repetir contraseña:</label><br>
        <input type="password" id="rep_contraseña" name="rep_contraseña" required>
        <span id="rep_contraseña-error" class="error-message"></span><br><br>

        <label for="ip">IP actual del equipo:</label><br>
        <input type="text" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" readonly>
        <span id="ip-error" class="error-message"></span><br><br>

        <span id="success-message" class="success-message"></span><br><br>

        <input type="submit" value="Registrar Usuario">
    </form>

    <?php
        function verificar_email($email)
        {
            if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
                return true;
            }
            return false;
        }
        
        function verificar_password_strength($contraseña)
        {
            if (preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $contraseña)) {
                return true;
            }
            return false;
        }
        
        function verificar_ip($ip)
        {
            return preg_match("/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])" .
                "(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/", $ip);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $password = $_POST['contraseña'];
            $confirm_password = $_POST['rep_contraseña'];
            $ip = $_POST['ip'];

            $error_messages = [];

            // Validación de datos
            if (empty($nombre)) {
                $error_messages['nombre'] = "El nombre es obligatorio.";
            }

            if (empty($apellido)) {
                $error_messages['apellido'] = "El apellido es obligatorio.";
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_messages['email'] = "El email no es válido.";
            }

            if (empty($password)) {
                $error_messages['contraseña'] = "La contraseña es obligatoria.";
            } elseif ($password !== $confirm_password) {
                $error_messages['rep_contraseña'] = "Las contraseñas no coinciden.";
            }

           // Comprobar si hay errores
            if (count($error_messages) > 0) {
                foreach ($error_messages as $field => $message) {
                    echo '<script>document.getElementById("' . $field . '-error").innerHTML = "' . $message . '";</script>';
                }
                // Mostrar alerta de error
                echo '<script>alert("Ha ocurrido un error. Por favor, verifique los datos e intente nuevamente.");</script>';
            } else {
                // Procesar el registro del usuario y mostrar un mensaje de éxito
                echo '<script>alert("Usuario registrado exitosamente");</script>';
            }

        }
?>

</body>
</html>