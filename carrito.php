<?php
session_start();
$carrito = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mi Carrito</title>
  <link rel="stylesheet" href="css/carrito.css">
</head>
<body>

<div class="cart-container">
  <h2>Mi Carrito</h2>

  <?php if (count($carrito) > 0): ?>
    <table>
      <tr>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Total</th>
        <th>Eliminar</th>
      </tr>
      <?php $total = 0; ?>
      <?php foreach ($carrito as $i => $producto): ?>
        <?php $subtotal = $producto['precio'] * $producto['cantidad']; ?>
        <?php $total += $subtotal; ?>
        <tr>
          <td><?= htmlspecialchars($producto['nombre']) ?></td>
          <td>S/<?= number_format($producto['precio'], 2) ?></td>
          <td><?= $producto['cantidad'] ?></td>
          <td>S/<?= number_format($subtotal, 2) ?></td>
          <td><a href="eliminar_carrito.php?index=<?= $i ?>">❌</a></td>
        </tr>
      <?php endforeach; ?>
      <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td colspan="2">S/<?= number_format($total, 2) ?></td>
      </tr>
    </table>
    <br>
    <a href="vaciar_carrito.php" class="vaciar-btn">Vaciar Carrito</a>
  <?php else: ?>
    <p>Tu carrito está vacío.</p>
  <?php endif; ?>
</div>

</body>
</html>
