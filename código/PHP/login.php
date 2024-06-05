<?php
session_start();
include 'conexion.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['password'])) {
    $email = $_POST['username']; // Cambiado de 'Email' a 'username'
    $contraseña_usuario = $_POST['password']; // Cambiado de 'contraseña' a 'password'

    $query = "SELECT id_cliente, contraseña FROM clientes WHERE email = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $hash_contraseña = $user['contraseña'];
         {if (password_verify($contraseña_usuario, $hash_contraseña)) {
            // Contraseña correcta
        } else {
            // Contraseña incorrecta
        }
        
            $_SESSION['user_id'] = $user['id_cliente'];
            header("Location: paginaPrincipal.php");
            exit;
        
        }
    } else {
        $error = "No se encontró un usuario con ese email.";
    }

    $stmt->close();
    $conexion->close();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header></header>

    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <!-- Muestra mensajes de error si los hay -->
        <?php if (!empty($error)): ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
