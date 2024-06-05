<?php 
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "Inicio del script<br>";

// Asumimos que los datos vienen de algún formulario o método similar
$idProducto = $_POST['idProducto'] ?? null;
$nombreProducto = $_POST['nombreProducto'] ?? null;
$precioProducto = $_POST['precioProducto'] ?? null;

// Resto de tu código
if (isset($idProducto, $nombreProducto, $precioProducto)) {
    echo "Datos recibidos<br>";

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
        echo "Carrito inicializado<br>";
    }

    if (!array_key_exists($idProducto, $_SESSION['carrito'])) {
        $_SESSION['carrito'][$idProducto] = array(
            'nombre' => $nombreProducto,
            'cantidad' => 1,
            'precio' => $precioProducto
        );
        echo "Producto añadido al carrito: $nombreProducto<br>"; // Mensaje cuando se agrega un producto nuevo al carrito
    } else {
        $_SESSION['carrito'][$idProducto]['cantidad']++;
        echo "Cantidad actualizada<br>";
    }
} else {
    echo "Datos del producto incompletos o no disponibles.<br>";
}

// Continuar con el resto del flujo de tu aplicación
echo "Fin del script<br>";

