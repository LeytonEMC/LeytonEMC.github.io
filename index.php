<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tienda de Teléfonos</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" href="img/logo.jpg" type="image/x-icon">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  />
</head>
<body>

<nav>
  <div class="nav-left">
    <img src="img/logo.jpg" alt="Logo Tienda" class="logo" />
  </div>

  <ul class="nav-center">
    <li><a href="#Inicio">Inicio</a></li>
    <li><a href="#Productos">Productos</a></li>
    <li><a href="#contacto">Contacto</a></li>
    <li><a href="nosotros.html">Nosotros</a></li>
  </ul>

  <div class="nav-right">
    <div class="cart-icon-container" onclick="toggleCart()">
      <i class="fa fa-shopping-cart"></i>
      <span class="cart-count" id="cart-count">0</span>
    </div>
    <?php if(isset($_SESSION['user_name'])): ?>
      <div class="user-info">
        <i class="fas fa-user"></i>
        <div class="user-text">
          <span>Hola, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
          <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
        </div>
      </div>
    <?php else: ?>
      <a href="login.php" class="login-btn" id="loginBtn">Login</a>
    <?php endif; ?>
  </div>
</nav>

<header class="hero-section">
  <div class="hero-text">
    <small class="offer">40% DE DESCUENTO HOY</small>
    <h1>Todo en uno <span class="highlight">,el mejor lugar</span><br />para dispositivos inteligentes</h1>
    <button class="btn-shop">Comprar Ahora</button>
  </div>
  <div class="hero-image">
    <img src="img/header2.jpg" alt="Headset" />
  </div>
</header>

<section class="brands-section">
  <h2>Marcas Destacadas</h2>
  <div class="brands-container">
    <img src="https://img.icons8.com/?size=100&id=PjkFdGXiQbvY&format=png&color=000000" alt="Samsung" />
    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple" />
    <img src="https://img.icons8.com/?size=100&id=7sAA223LZGHS&format=png&color=000000" alt="Xiaomi" />
    <img src="https://img.icons8.com/?size=100&id=J6KrwEA3pKAF&format=png&color=000000" alt="Huawei" />
  </div>
</section>

<section id="Productos" class="products-section">
  <div class="products-container">
    <div class="product-card">
      <img src="img/s23ultra.jpg" alt="Samsung Galaxy S23" />
      <h3>Samsung Galaxy S23</h3>
      <p class="price">S/2230.00</p>
      <button class="add-cart-btn" data-name="Samsung Galaxy S23" data-price="2230.00">Agregar al carrito</button>
    </div>
    <div class="product-card">
      <img src="https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-14-pro-max-gold-select?wid=940&hei=1112&fmt=png-alpha&.v=1660753619946" alt="iPhone 14 Pro Max" />
      <h3>iPhone 14 Pro Max</h3>
      <p class="price">S/3749.00</p>
      <button class="add-cart-btn" data-name='iPhone 14 Pro Max' data-price= "3749.00">Agregar al carrito</button>
    </div>
    <div class="product-card">
      <img src="img/redmi.jpg" alt="Xiaomi Redmi Note 12" />
      <h3>Xiaomi Redmi Note 12</h3>
      <p class="price">S/629.00</p>
      <button class="add-cart-btn" data-name='Xiaomi Redmi Note 12' data-price= 629.00 >Agregar al carrito</button>
    </div>
    <div class="product-card">
      <img src="img/oppo.jpg" alt="Oppo Reno 7" />
      <h3>Oppo Reno 7</h3>
      <p class="price">S/900.00</p>
      <button class="add-cart-btn" data-name='Oppo Reno 7' data-price= 900.00 >Agregar al carrito</button>
    </div>
    <div class="product-card">
      <img src="img/honor.jpg" alt="Honor X8B" />
      <h3>Honor X8B</h3>
      <p class="price">S/1180.00</p>
      <button class="add-cart-btn" data-name= 'Honor X8B' data-price= 1180.00>Agregar al carrito</button>
    </div>
    <div class="product-card">
      <img src="img/huawei.jpg" alt="Huawei Mate 40" />
      <h3>Huawei Mate 40</h3>
      <p class="price">S/5783.00</p>
      <button class="add-cart-btn" data-name='Huawei Mate 40' data-price= 5783.00 >Agregar al carrito</button>
    </div>
  </div>
</section>

<section id="contacto" class="contact-section">
  <div class="contact-info">
    <h2>Contáctanos</h2>
    <p>Si tienes alguna duda o necesitas ayuda, no dudes en enviarnos un mensaje. Estamos para ayudarte.</p>
    <ul>
      <li><i class="fa-solid fa-phone"></i> 921 587 609</li>
      <li><i class="fa-solid fa-envelope"></i> telefonos2025@gmail.com</li>
      <li><i class="fa-solid fa-location-dot"></i> La merced - Chanchamayo, Peru</li>
    </ul>
  </div>

  <form class="contact-form">
    <input type="text" placeholder="Tu Nombre" required />
    <input type="email" placeholder="Tu Email" required />
    <textarea placeholder="Tu Mensaje..." rows="5" required></textarea>
    <button type="submit">Enviar Mensaje</button>
  </form>
</section>

<footer class="footer">
  <p>© 2025 Todos los derechos reservados.</p>
</footer>

<div id="cart-popup" class="cart-popup hidden">
  <div class="cart-popup-header">
    <h3>Mi carrito</h3>
    <button class="close-cart" onclick="toggleCart()">×</button>
  </div>
  <ul id="cart-items" class="cart-items">
    <!-- Productos agregados aparecerán aquí -->
  </ul>
<div class="cart-popup-footer" style="display: flex; justify-content: space-between; align-items: center;">
  <a href="https://wa.me/51922133941" target="_blank" style="background-color: #25D366; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none; font-weight: bold;">
    Comprar
  </a>
  <p>Total: <span id="cart-total">S/0.00</span></p>
</div>
</div>

<script src="js/carrito.js"></script>
<script src="js/script.js"></script>

</body>
</html>
