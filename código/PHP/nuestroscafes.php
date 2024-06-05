<?php 
include "conexion.php";

function mostrarProductos($conexion) {
    $sql = "SELECT p.id_producto, p.titulo, p.descripcion, p.precio, p.stock, c.nombre_categoria AS categoria 
            FROM Productos p
            JOIN CategoriaProductos c ON p.id_categoria = c.id_categoria";

    $resultado = mysqli_query($conexion, $sql);
    $html = '';
    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $id = $fila['id_producto'] ?? 'ID no disponible';
            $titulo = $fila['titulo'] ?? 'Título no disponible';
            $descripcion = $fila['descripcion'] ?? 'Descripción no disponible';
            $precio = $fila['precio'] ?? '0';
            $stock = $fila['stock'] ?? 'Sin stock';
            $categoria = $fila['categoria'] ?? 'Categoría no disponible';
            $html .= "<div class='item'>
            <figure>
                <img src='https://plus.unsplash.com/premium_photo-1661495730774-3b8df952808e?q=80&w=1966&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90oy1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' alt='producto'>
            </figure>
            <div class='info-product'>
                <h2>$titulo</h2>
                <p class='price'>$precio €</p>

                <button type='button' class='tipo-cafe-btn'>Tipo de café</button>
                <div class='tipo-cafe-select hidden'>
                    <select name='tipoCafe'>
                        <option value='grano'>En grano</option>
                        <option value='molido'>Molido</option>
                        <option value='espresso'>Espresso</option>
                    </select>
                </div>

                <button type='button' class='cantidad-cafe-btn'>Cantidad</button>
                <div class='cantidad-cafe-select hidden'>
                    <select name='cantidad'>
                        <option value='250'>250 gr</option>
                        <option value='1000'>1 kg</option>
                    </select>
                </div>

                <form class='agregar-carrito-form' action='carrito.php' method='post'>
                    <input type='hidden' name='idProducto' value='$id'>
                    <input type='hidden' name='nombreProducto' value='$titulo'>
                    <input type='hidden' name='precioProducto' value='$precio'>
                    <button type='submit' class='agregar-carrito-btn'>Añadir al carrito</button>
                </form>
            </div>
          </div>";
        }
    } else {
        $html = "Error: " . mysqli_error($conexion);
    }
    return $html;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nuestros Cafés</title>
    <link rel="stylesheet" href="css/nuestroscafes.css" />
</head>
<body>
    <header>
        <h1>Nuestros Cafés</h1>

        <div class="container-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-cart">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/>
            </svg>
            <div class="count-products">
                <span id="contador-productos">0</span>
            </div>
        </div>
    </header>
    <div class="container-cart-products hidden-cart">
    <!-- Este div se llenará dinámicamente con los detalles del carrito -->
    <ul id="cart-items-list">
        <!-- Los ítems del carrito se añadirán aquí dinámicamente -->
    </ul>
    <!-- Aquí se mostrará el total del carrito -->
    <div class="shopping-cart-total"></div>
    <!-- Botón para vaciar todo el carrito -->
    <!-- Botón para vaciar todo el carrito -->
    <button id="vaciar-carrito-btn" onclick="emptyCart()" style="display: inline-block; padding: 10px 20px; margin: 10px; background-color: #cc0000; color: white; border: none; border-radius: 5px; cursor: pointer;">Vaciar Carrito</button>
<button id="comprar-btn" onclick="comprar()" style="display: inline-block; padding: 10px 20px; margin: 10px; background-color: #009933; color: white; border: none; border-radius: 5px; cursor: pointer;">Comprar</button>

</div>

    <div class="container-items">
        <?php echo mostrarProductos($conexion); ?>
    </div>

    <script>
    function comprar() {
        alert('¡Gracias por tu compra!');
        // Aquí puedes agregar más funcionalidad para finalizar la compra, como enviar los datos al servidor, etc.
    }

    function emptyCart() {
    if (confirm("¿Estás seguro de que quieres vaciar el carrito?")) {
        const cartContainer = document.querySelector('.container-cart-products');
        cartContainer.innerHTML = ''; // Elimina todo el contenido del contenedor
        const contadorProductos = document.getElementById('contador-productos');
        contadorProductos.textContent = '0'; // Restablece el contador de productos a cero

        // Mostrar nuevamente los botones Vaciar Carrito y Comprar
        document.getElementById('vaciar-carrito-btn').style.display = 'inline-block';
        document.getElementById('comprar-btn').style.display = 'inline-block';
    }
}




    </script>

<script src="./Js/nuestroscafes.js"></script>


</body>
</html>