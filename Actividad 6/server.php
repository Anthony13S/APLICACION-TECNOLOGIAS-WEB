<?php
echo "<!DOCTYPE html><html lang='es'><head><meta charset='UTF-8'><title>Resultados</title>";
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>";
echo "</head><body class='bg-dark text-light container py-5'>";
echo "<h2 class='mb-4'>Datos Recibidos</h2><ul class='list-group'>";

foreach ($_POST as $campo => $valor) {
    if (is_array($valor)) {
        echo "<li class='list-group-item bg-secondary text-light'><strong>$campo</strong>: " . implode(", ", $valor) . "</li>";
    } else {
        echo "<li class='list-group-item bg-secondary text-light'><strong>$campo</strong>: $valor</li>";
    }
}

