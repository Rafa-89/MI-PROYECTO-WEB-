<?php
$host = "localhost";
$user = "root";
$pass = ""; // Asegúrate de que esta sea la contraseña correcta para tu entorno
$baseDatos = "cafe";

$conexion = new mysqli($host, $user, $pass, $baseDatos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
echo "Conexión exitosa";
// No hay necesidad de cerrar la conexión aquí ni de usar return
