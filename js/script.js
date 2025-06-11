const cart = [];

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
}

function updateCartUI() {
  let cartContent = 'Tu carrito:\n';
  cart.forEach(item => {
    cartContent += `${item.name} - ${item.amount} x S/${item.price.toFixed(2)}\n`;
  });
  alert(cartContent); // Puedes cambiarlo por una UI modal o popup
}

// Agregar evento a todos los botones "Agregar al carrito"
document.querySelectorAll('.add-cart-btn').forEach(button => {
  button.addEventListener('click', () => {
    const productName = button.getAttribute('data-name');
    const productPrice = parseFloat(button.getAttribute('data-price'));
    addToCart(productName, productPrice);
  });
});
