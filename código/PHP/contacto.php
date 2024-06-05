<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/contacto.css">
</head>
<body>
    <div class="container">
        <h1>Contacto</h1>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Enviar">
            </div>
        </form>
        <div class="contact-info">
            <h2>Información de contacto</h2>
            <p><strong>Teléfono:</strong> 958085698</p>
            <p><strong>Correo electrónico:</strong> infocafecito@gmail.com</p>
            <p><strong>Dirección:</strong> Calle Torre Comares, 12</p>
        </div>
    </div>
</body>
</html>
