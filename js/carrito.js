const cart = [];

function toggleCart() {
  const cartPopup = document.getElementById('cart-popup');
  cartPopup.classList.toggle('show');
}

function actualizarCarrito(cantidad) {
  const contador = document.getElementById('cart-count');
  contador.textContent = cantidad;
}

function addToCart(name, price) {
  const existingProduct = cart.find(item => item.name === name);
  if (existingProduct) {
    existingProduct.amount += 1;
  } else {
    cart.push({ name, price, amount: 1 });
  }
  actualizarCarrito(cart.reduce((acc, item) => acc + item.amount, 0));
  updateCartUI();
  toggleCart(); // Muestra el carrito al agregar un producto
}

function updateCartUI() {
  const cartItemsContainer = document.getElementById('cart-items');
  cartItemsContainer.innerHTML = '';
  let total = 0;

  cart.forEach(item => {
    total += item.price * item.amount;
    const li = document.createElement('li');
    li.textContent = `${item.name} - ${item.amount} x S/${item.price.toFixed(2)}`;
    cartItemsContainer.appendChild(li);
  });

document.getElementById('cart-total').textContent = `S/${total.toFixed(2)}`;
}

// Agrega evento a todos los botones con clase .add-cart-btn
document.querySelectorAll('.add-cart-btn').forEach(button => {
  button.addEventListener('click', () => {
    const productName = button.getAttribute('data-name');
    const productPrice = parseFloat(button.getAttribute('data-price'));
    addToCart(productName, productPrice);
  });
});

// Evento para el icono del carrito que también abre/cierra el carrito
document.querySelector('.cart-icon-container').addEventListener('click', toggleCart);
