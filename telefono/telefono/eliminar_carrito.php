<?php
session_start();
if (isset($_GET['index'])) {
  $i = intval($_GET['index']);
  unset($_SESSION['cart'][$i]);
  $_SESSION['cart'] = array_values($_SESSION['cart']);
}
header('Location: carrito.php');
exit;
