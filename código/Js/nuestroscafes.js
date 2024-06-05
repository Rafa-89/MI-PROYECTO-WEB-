document.addEventListener('DOMContentLoaded', function() {
    const addToShoppingCartButtons = document.querySelectorAll('.agregar-carrito-btn');
    const cartIcon = document.querySelector('.icon-cart'); // Selecciona el ícono del carrito
    const cartContainer = document.querySelector('.container-cart-products'); // Contenedor del carrito
    const contadorProductos = document.getElementById('contador-productos'); // Contador del carrito
    const tipoCafeBtns = document.querySelectorAll('.tipo-cafe-btn'); // Botones para seleccionar tipo de café
    const cantidadCafeBtns = document.querySelectorAll('.cantidad-cafe-btn'); // Botones para seleccionar cantidad

    addToShoppingCartButtons.forEach((addToCartButton) => {
        addToCartButton.addEventListener('click', addToCartClicked);
    });

    cartIcon.addEventListener('click', () => {
        cartContainer.classList.toggle('hidden-cart'); // Alterna la visibilidad del carrito
    });

    tipoCafeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const selectContainer = this.nextElementSibling;
            selectContainer.classList.toggle('hidden'); // Alterna visibilidad del contenedor
        });
    });

    cantidadCafeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const selectContainer = this.nextElementSibling;
            selectContainer.classList.toggle('hidden'); // Alterna visibilidad del contenedor
        });
    });

    function addToCartClicked(event) {
        event.preventDefault();
        const button = event.target;
        const item = button.closest('.item');
        const itemTitle = item.querySelector('.info-product h2').textContent;
        const itemPrice = item.querySelector('.price').textContent;
        const itemImage = item.querySelector('figure img').src;

        addItemToShoppingCart(itemTitle, itemPrice, itemImage);
        updateCartCounter();
    }

    function addItemToShoppingCart(itemTitle, itemPrice, itemImage) {
        let productExists = false;
        const cartItems = document.querySelectorAll('.cart-item');
        cartItems.forEach(cartItem => {
            const itemTitleElement = cartItem.querySelector('.item-name');
            if (itemTitleElement.textContent === itemTitle) {
                const itemQuantityElement = cartItem.querySelector('.item-quantity');
                let itemQuantity = parseInt(itemQuantityElement.textContent.replace('Cantidad: ', ''));
                itemQuantityElement.textContent = `Cantidad: ${itemQuantity + 1}`;
                productExists = true;
            }
        });

        if (!productExists) {
            const shoppingCartRow = document.createElement('div');
            shoppingCartRow.innerHTML = `
                <ul>
                    <li class="cart-item">
                        <img src="${itemImage}" alt="producto" style="width:50px; height:50px;">
                        <span class="item-name">${itemTitle}</span>
                        <span class="item-quantity">Cantidad: 1</span>
                        <span class="item-price">${itemPrice}</span>
                        <button class="remove-item" onclick="removeItemFromCart(this)">Eliminar</button>
                    </li>
                </ul>`;
            cartContainer.appendChild(shoppingCartRow);
        }
        // Actualiza el total del carrito después de agregar el nuevo artículo
        updateShoppingCartTotal();
    }

    function updateCartCounter() {
        let currentCount = parseInt(contadorProductos.textContent);
        contadorProductos.textContent = currentCount + 1;
    }

    window.removeItemFromCart = function(button) {
        const cartItem = button.closest('.cart-item');
        const itemQuantityElement = cartItem.querySelector('.item-quantity');
        let itemQuantity = parseInt(itemQuantityElement.textContent.replace('Cantidad: ', ''));
        if (itemQuantity > 1) {
            itemQuantityElement.textContent = `Cantidad: ${itemQuantity - 1}`;
        } else {
            cartItem.remove();
        }
        updateCartCounter(-1); // Actualiza el contador de productos al eliminar un artículo
        updateShoppingCartTotal(); // Actualiza el total del carrito después de eliminar un artículo
    }
    
    

    // Función para calcular y mostrar el total del carrito
    function updateShoppingCartTotal() {
        let total = 0;
        const cartItems = document.querySelectorAll('.cart-item');
        cartItems.forEach(cartItem => {
            const itemPriceElement = cartItem.querySelector('.item-price');
            const itemQuantityElement = cartItem.querySelector('.item-quantity');
            const itemPrice = parseFloat(itemPriceElement.textContent);
            const itemQuantity = parseInt(itemQuantityElement.textContent.replace('Cantidad: ', ''));
            total += itemPrice * itemQuantity;
        });
        const shoppingCartTotal = document.querySelector('.shopping-cart-total');
        shoppingCartTotal.textContent = `Total: ${total.toFixed(2)}€`;
    }

    // Llamar a la función de actualización del total del carrito al cargar la página
    updateShoppingCartTotal();

    function comprar() {
        alert('¡Gracias por tu compra!');
        // Aquí puedes agregar más funcionalidad para finalizar la compra, como enviar los datos al servidor, etc.
    }
});
