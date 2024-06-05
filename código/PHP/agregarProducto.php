
<?php 
// En agregarProducto.php
session_start();

// Supongamos que recibes el ID del producto así
$idProducto = $_POST['idProducto'];

// Aquí deberías buscar en tu array de productos el producto basado en $idProducto
// y obtener los detalles del producto como el precio, nombre, etc.

// Luego añades el producto a la sesión del carrito
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Verifica si el producto ya está en el carrito y aumenta la cantidad
if (isset($_SESSION['carrito'][$idProducto])) {
    $_SESSION['carrito'][$idProducto]['cantidad']++;
} else {
    // Añade el producto al carrito
    $_SESSION['carrito'][$idProducto] = array(
        'nombre' => $nombreProducto,
        'precio' => $precioProducto,
        'cantidad' => 1
    );
}

// Redirige de vuelta a la página de productos
header('Location: nuestroscafes.php');



?>
