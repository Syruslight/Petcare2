<?php
// Incluir la clase Dompdf
require_once 'dompdf/autoload.inc.php';

// Usar el namespace de Dompdf
use Dompdf\Dompdf;

// Crear una instancia de Dompdf
$dompdf = new Dompdf();

// Contenido HTML que se convertirá a PDF
$html = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Ejemplo de PDF con Dompdf</title>
</head>
<body>
  <h1>Ejemplo de PDF con Dompdf</h1>
  <p>¡Hola, mundo!</p>
</body>
</html>
';

// Cargar el contenido HTML en Dompdf
$dompdf->loadHtml($html);

// Renderizar el PDF
$dompdf->render();

// Generar el PDF y guardarlo en un archivo
$dompdf->stream('ejemplo.pdf', ['Attachment' => false]);
?>
