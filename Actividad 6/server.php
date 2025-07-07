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
// archivo
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
    $nombreArchivo = $_FILES['archivo']['name'];
    echo "<li class='list-group-item bg-secondary text-light'><strong>archivo</strong>: $nombreArchivo</li>";
}

echo "</ul>";
echo "<a href='index.html' class='btn btn-light mt-4'>Volver al formulario</a>";
echo "</body></html>";
?>

