<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="icon" href="img/logo.jpg" type="image/x-icon" />
    <title>Página de Login | Caged coder</title>
  </head>

  <body>
    <!-- Barra de navegación -->
    <nav>
      <div class="nav-left">
        <img src="img/logo.jpg" alt="Logo Tienda" class="logo" />
      </div>

      <ul class="nav-center">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a href="nosotros.html" class="active">Nosotros</a></li>
      </ul>

      <div class="nav-right">
        <div class="cart" id="cart" title="Ver carrito de compras">
          <span class="cart-icon">🛒</span>
          <span class="cart-count" id="cart-count">0</span>
        </div>
        <a href="login.php" class="login-btn" id="loginBtn">Login</a>
      </div>
    </nav>

    <div class="container" id="container">

<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 'emptyfields') {
        echo '<p style="color:red; text-align:center;">Por favor llena todos los campos.</p>';
    } elseif ($error == 'wrongpassword') {
        echo '<p style="color:red; text-align:center;">Contraseña incorrecta.</p>';
    } elseif ($error == 'nouser') {
        echo '<p style="color:red; text-align:center;">Usuario no encontrado.</p>';
    } elseif ($error == 'emailregistered') {
        echo '<p style="color:red; text-align:center;">El correo ya está registrado.</p>';
    } elseif ($error == 'registerfail') {
        echo '<p style="color:red; text-align:center;">Error en el registro, inténtalo nuevamente.</p>';
    }
}

if (isset($_GET['register']) && $_GET['register'] == 'success') {
    echo '<p style="color:green; text-align:center;">Registro exitoso. Ahora inicia sesión.</p>';
}
?>

      <div class="form-container sign-up">
        <form action="register_process.php" method="POST">
          <h1>Crear Cuenta</h1>
          <div class="social-icons">
            <a href="#" class="icon"
              ><i class="fa-brands fa-google-plus-g"></i
            ></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="#" class="icon"
              ><i class="fa-brands fa-linkedin-in"></i
            ></a>
          </div>
          <span>o usa tu correo electrónico para registrarte</span>
          <input type="text" name="nombre" placeholder="Nombre" required />
          <input type="email" name="email" placeholder="Correo electrónico" required />
          <input type="password" name="password" placeholder="Contraseña" required />
          <button type="submit">Registrarse</button>
        </form>
      </div>
      <div class="form-container sign-in">
        <form action="login_process.php" method="POST">
          <h1>Iniciar Sesión</h1>
          <div class="social-icons">
            <a href="#" class="icon"
              ><i class="fa-brands fa-google-plus-g"></i
            ></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="#" class="icon"
              ><i class="fa-brands fa-linkedin-in"></i
            ></a>
          </div>
          <span>o usa tu correo electrónico y contraseña</span>
          <input type="email" name="email" placeholder="Correo electrónico" required />
          <input type="password" name="password" placeholder="Contraseña" required />
          <a href="#">¿Olvidaste tu contraseña?</a>
          <button type="submit">Iniciar Sesión</button>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>¡Bienvenido de nuevo!</h1>
            <p>Ingresa tus datos personales para usar todas las funciones del sitio</p>
            <button class="hidden" id="login">Iniciar Sesión</button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>¡Hola, amigo!</h1>
            <p>Regístrate con tus datos personales para usar todas las funciones del sitio</p>
            <button class="hidden" id="register">Registrarse</button>
          </div>
        </div>
      </div>
    </div>

    <script src="js/login.js"></script>
  </body>
</html>
