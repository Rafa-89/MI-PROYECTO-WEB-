<?php
session_start();
require_once 'funciones.php';  // Este archivo debe contener las funciones de tu carrito

if (isset($_POST['id_producto']) && isset($_POST['cantidad'])) {
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];

    agregarAlCarrito($id_producto, $cantidad);

    header("Location: nuestroscafes.php"); // Redirecciona de vuelta a la página de productos
    exit();
}
?>
