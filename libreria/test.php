<?php
// Incluir la clase Dompdf
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf();
?>
<?php
$html ='<html> <head>

</head>
<body>
<h1> hola mundo
                                    </body>
                                    </html>

';
$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream();
?>