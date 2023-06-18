<?php
// Incluir la clase Dompdf
require_once '../../libreria/dompdf/autoload.inc.php';
require('../../controlador/conexion.php');

$conn = conectar();

use Dompdf\Dompdf;

$idmascota = $_GET['idmascota'];

$sentencia = "SELECT vacuna.fecha as fecha, vacuna.lote as lote, vacuna.tipo as tipo, detallevacuna.proxFecha as proxima, detallevacuna.observacion as observacion, detallevacuna.restricciones as restriccion FROM `mascota` as mascota 
inner join detallevacuna as detallevacuna on mascota.idmascota= detallevacuna.idmascota 
inner join vacuna as vacuna on vacuna.idvacuna=detallevacuna.idvacuna
WHERE mascota.idmascota=$idmascota";

$sentencia2 = "SELECT mascota.nombre, mascota.fotoPerfil, 
CONCAT(
    FLOOR(DATEDIFF(CURRENT_DATE(), mascota.fechaNac) / 365), ' años, ',
    FLOOR((DATEDIFF(CURRENT_DATE(), mascota.fechaNac) % 365) / 30), ' meses, ',
    DATEDIFF(CURRENT_DATE(), mascota.fechaNac) % 30, ' días'
) AS edad, mascota.sexo, mascota.peso, raza.nombre AS nombre_raza, mascota.esterilizado, mascota.renian
FROM mascota INNER JOIN raza ON mascota.idraza = raza.idraza
WHERE mascota.idmascota=$idmascota";

$result = $conn->query($sentencia);
$result2 = $conn->query($sentencia2);

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set('isRemoteEnabled', true);
$dompdf->setOptions($options);
$html = '
<!DOCTYPE html>
<html> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.contenedorImgTexto {
    display: flex;
    align-items: center;
    height: 33vh; /* El 33% de la altura visible del documento */
  }
  
  .imageWrapper {
    flex: 0 0 auto;
    width: 20%;
    max-height: 100%;
    overflow: hidden;
  }
  
  .profile-image {
    width: 100%;
    height: auto;
  }
  
  .contenedorTexto {
    flex: 1 1 auto;
  }
  
  .listWrapper {
    display: flex;
    align-items: center;
  }
  
  ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }
  
  .label {
    font-weight: bold;
  }
  
  .value {
    margin-left: 5px;
  }
      </style>
</head>
<body>
<section class="moda modalMascota modalMascotaCarne">';

while ($row = $result2->fetch_assoc()) {
    $ruta_imagen = '../../imagenes/fotosperfil/mascota/' . $row['fotoPerfil'];

    // Leer el contenido de la imagen
    $imagen_data = file_get_contents($ruta_imagen);

    // Convertir la imagen a base64
    $imagen_base64 = base64_encode($imagen_data);
    //Asignas el nombre a la variable nombre mascota para nombre del pdf
    $nombreMascota = $row['nombre'];

    $html .= '<div class="contenedorImgTexto">
    <table>
  <tr>
    <td> <div class="imageWrapper">
      <img class="profile-image" src="data:image/jpeg;base64,' . $imagen_base64 . '">
    </div></td>
    <td> <div class="contenedorTexto">
      <div class="listWrapper">
        <ul>
          <li> 
            <span class="label">Renian:</span>
            
            <span class="value">' . $row['renian'] . ' </span>
          </li>
          <li> 
            <span class="label">Edad:</span>
            <span class="value">' . $row['edad'] . ' </span>
          </li>
          <li> 
            <span class="label">Sexo:</span>
            <span class="value">' . $row['sexo'] . ' </span>
          </li>
          <li> 
            <span class="label">Peso:</span>
            <span class="value">' . $row['peso'] . ' Kg. </span>
          </li>
          <li> 
            <span class="label">Raza:</span>
            <span class="value">' . $row['nombre_raza'] . ' </span>
          </li>
          <li> 
            <span class="label">Esterilizado:</span>
            <span class="value">' . $row['esterilizado'] . ' </span>
          </li> 
        </ul>
      </div>
    </div>
    </td>
  </tr>
</table>
   
   
  </div>
';
}



$html .= '
   

    <div class="row carnet-tit">
        <h1>CARNET DE SALUD</h1>
    </div>
   
                <img src="../../../imagenes/PHlogo.png" alt="logo" class="col">
                <span class="col">Mis vacunas</span>
                <img src="../../../imagenes/PHlogo.png" alt="logo" class="col">
           
           
                    <table class="table table-borderless table-striped table-responsive text-center">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Lote</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Próxima</th>
                                <th scope="col" class="th">Observación</th>
                                <th scope="col" class="th">Restricción</th>
                            </tr>
                        </thead>
                        <tbody>';

while ($row = $result->fetch_assoc()) {
    $html .= '
                            <tr>
                                <td>' . $row['fecha'] . '</td>
                                <td>' . $row['lote'] . '</td>
                                <td>' . $row['tipo'] . '</td>
                                <td>' . $row['proxima'] . '</td>
                                <td>' . $row['observacion'] . '</td>
                                <td>' . $row['restriccion'] . '</td>
                            </tr>';
}

$html .= '
                        </tbody>
                    </table>
               
</section>
</body>
</html>';

$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
//Concatenas el nombre de la mascota + el nombre en una nueva variable
$nommbreDocumento = "CarnetMascota" . "$nombreMascota" . ".pdf";
//asginas el nuevo nombre del pdf a la variable
$dompdf->stream($nommbreDocumento);
?>
