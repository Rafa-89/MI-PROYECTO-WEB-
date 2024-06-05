<?php
function getProductos($mysqli) {
    $sql = "SELECT id, nombre, descripcion, precio, imagen FROM productos";
    return $mysqli->query($sql);
}

function agregarAlCarrito($id_producto, $cantidad) {
    if (!isset($_SESSION['carrito'][$id_producto])) {
        $_SESSION['carrito'][$id_producto] = $cantidad;
    } else {
        $_SESSION['carrito'][$id_producto] += $cantidad;
    }
}
?>
