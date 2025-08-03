<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <h2 class="text-center mb-4">Formulario de Factura</h2>

    <!-- FORMULARIO -->
    <div class="card shadow">
        <div class="card-body">
            <form action="/factura" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="cliente" class="form-label">Nombre del Cliente</label>
                    <input type="text" name="cliente" class="form-control" value="{{ old('cliente') }}" required>
                </div>

                <div class="mb-3">
                    <label for="producto" class="form-label">Nombre del Producto</label>
                    <input type="text" name="producto" class="form-control" value="{{ old('producto') }}" required>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" value="{{ old('cantidad') }}" min="1" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="precio" class="form-label">Precio Unitario ($)</label>
                        <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio') }}" min="0" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="iva" class="form-label">IVA (%)</label>
                        <input type="number" step="0.01" name="iva" class="form-control" value="{{ old('iva', 12) }}">
                        <small class="text-muted">Por defecto 12%</small>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">Calcular Total</button>
                </div>
            </form>
        </div>
    </div>

    <!-- RESULTADO DE FACTURA -->
    @if(isset($total))
    <div class="card shadow mt-5">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Factura Generada</h5>
        </div>
        <div class="card-body">
            <p><strong>Cliente:</strong> {{ $cliente }}</p>
            <p><strong>Producto:</strong> {{ $producto }}</p>
            <p><strong>Cantidad:</strong> {{ $cantidad }}</p>
            <p><strong>Precio Unitario:</strong> ${{ number_format($precio, 2) }}</p>
        </div>
        <div class="card-footer bg-light">
            <div class="row">
                <div class="col-6"><strong>Subtotal:</strong></div>
                <div class="col-6 text-end">${{ number_format($subtotal, 2) }}</div>

                <div class="col-6"><strong>IVA ({{ $iva }}%):</strong></div>
                <div class="col-6 text-end">${{ number_format($valorIva, 2) }}</div>

                <div class="col-6"><strong>Total a Pagar:</strong></div>
                <div class="col-6 text-end fw-bold text-success">${{ number_format($total, 2) }}</div>
            </div>
        </div>
    </div>
    @endif

</div>

</body>
</html>


