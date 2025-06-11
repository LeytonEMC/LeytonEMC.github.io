<?php
session_start();

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $precio = floatval($_POST['precio']);
  $cantidad = intval($_POST['cantidad']);

  $producto = [
    'nombre' => $nombre,
    'precio' => $precio,
    'cantidad' => $cantidad
  ];

  $encontrado = false;

  foreach ($_SESSION['cart'] as &$item) {
    if ($item['nombre'] === $nombre) {
      $item['cantidad'] += $cantidad;
      $encontrado = true;
      break;
    }
  }

  if (!$encontrado) {
    $_SESSION['cart'][] = $producto;
  }

  header('Location: carrito.php');
  exit;
}
?>
