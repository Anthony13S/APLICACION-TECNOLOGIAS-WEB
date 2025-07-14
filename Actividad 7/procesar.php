<?php
function calcularTotal($precio, $cantidad, $aplicaIVA) {
    $subtotal = $precio * $cantidad;
    $iva = $aplicaIVA ? $subtotal * 0.15 : 0;
    $total = $subtotal + $iva;
    return [$subtotal, $iva, $total];
}

// Capturar datos
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$fecha = $_POST['fecha'];
$comentarios = $_POST['comentarios'];
$productos = $_POST['producto'];
$categorias = $_POST['categoria'];
$precios = $_POST['precio'];
$cantidades = $_POST['cantidad'];
$ivaSeleccionado = isset($_POST['iva']) ? $_POST['iva'] : [];

$subtotalGeneral = 0;
$totalIVA = 0;
$totalPagar = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Factura Generada</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .factura-box {
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .table thead {
      background-color: #0d6efd;
      color: white;
    }
    .card-total {
      border-left: 5px solid #0d6efd;
    }
  </style>
</head>
<body class="container py-5">

  <div class="factura-box">
    <h2 class="text-center mb-4">Factura</h2>

    <div class="row mb-3">
      <div class="col-md-6">
        <p><strong>Cliente:</strong> <?= htmlspecialchars($nombre) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
      </div>
      <div class="col-md-6 text-md-end">
        <p><strong>Fecha:</strong> <?= htmlspecialchars($fecha) ?></p>
        <p><strong>Comentarios:</strong> <?= htmlspecialchars($comentarios) ?></p>
      </div>
    </div>

    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Categoría</th>
          <th>Precio Unitario</th>
          <th>Cantidad</th>
          <th>IVA</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($productos as $i => $producto):
          $precio = (float)$precios[$i];
          $cantidad = (int)$cantidades[$i];
          $categoria = $categorias[$i];
          $aplicaIVA = in_array((string)$i, $ivaSeleccionado);

          list($subtotal, $iva, $total) = calcularTotal($precio, $cantidad, $aplicaIVA);

          $subtotalGeneral += $subtotal;
          $totalIVA += $iva;
          $totalPagar += $total;
        ?>
        <tr>
          <td><?= htmlspecialchars($producto) ?></td>
          <td><?= htmlspecialchars($categoria) ?></td>
          <td>$<?= number_format($precio, 2) ?></td>
          <td><?= $cantidad ?></td>
          <td>$<?= number_format($iva, 2) ?></td>
          <td>$<?= number_format($total, 2) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card shadow-sm card-total mb-3">
          <div class="card-body">
            <h5 class="card-title">Subtotal General</h5>
            <p class="card-text h5">$<?= number_format($subtotalGeneral, 2) ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm card-total mb-3">
          <div class="card-body">
            <h5 class="card-title">IVA Total (15%)</h5>
            <p class="card-text h5 text-warning">$<?= number_format($totalIVA, 2) ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm card-total mb-3 bg-success text-white">
          <div class="card-body">
            <h5 class="card-title">Total a Pagar</h5>
            <p class="card-text h5">$<?= number_format($totalPagar, 2) ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-4">
      <a href="index.html" class="btn btn-primary">← Volver al Formulario</a>
    </div>
  </div>

</body>
</html>
