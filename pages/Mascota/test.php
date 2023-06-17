<?php
// Incluir la clase Dompdf
require_once '../../libreria/dompdf/autoload.inc.php';
require('../../controlador/conexion.php');
$conn = conectar();

use Dompdf\Dompdf;
$idmascota = $_GET['idmascota'];


$sentencia="SELECT vacuna.fecha as fecha ,vacuna.lote as lote,vacuna.tipo as tipo ,detallevacuna.proxFecha as proxima,detallevacuna.observacion as observacion,detallevacuna.restricciones as restriccion FROM `mascota` as mascota 
inner join detallevacuna as detallevacuna on mascota.idmascota= detallevacuna.idmascota 
inner join vacuna as vacuna on vacuna.idvacuna=detallevacuna.idvacuna
 WHERE mascota.idmascota=$idmascota";

$sentencia2="SELECT mascota.nombre, mascota.fotoPerfil, 
CONCAT(
    FLOOR(DATEDIFF(CURRENT_DATE(), mascota.fechaNac) / 365), ' años, ',
    FLOOR((DATEDIFF(CURRENT_DATE(), mascota.fechaNac) % 365) / 30), ' meses, ',
    DATEDIFF(CURRENT_DATE(), mascota.fechaNac) % 30, ' días'
) AS edad,mascota.sexo, mascota.peso, raza.nombre AS nombre_raza,mascota.esterilizado,mascota.renian
FROM mascota INNER JOIN raza ON mascota.idraza = raza.idraza
WHERE mascota.idmascota=$idmascota"; 

$result = $conn->query($sentencia);
$result2 = $conn->query($sentencia2);

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set('isRemoteEnabled', true);
$dompdf->setOptions($options);
$html ='
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="mascotaEstilos.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
<section class="moda modalMascota modalMascotaCarne">
    <div class="row modal-SaludMascota" id="modal-Carnet">

        <div class="container" style="background-color: #c8dfda>
            <div class="row header-ReMas justify-content-end">
                <div class="row close-btn">
                    <span class="btn btn-dark modal__close" style="width: 50px;">✖</span>
                </div>
            </div>
            <div class="row mascota-container">
                <div class="card-mascota">
                  
                        <div class="card">
                            <h5 class="card-title">
                                <label id="nombre2"></label>
                            </h5>
                            <div class="img-card">
                                <img id="perfil-img2" alt="profile" class="card-img-bottom img">
                            </div>
                            <div class="card-body">
                                <span class="card-text">
                                    <div class="co1">
                                        <ul class="list-unstyled">
                                            <li>Renian:</li>
                                            <li>Edad:</li>
                                            <li>Sexo:</li>
                                            <li>Peso:</li>
                                            <li>Raza:</li>
                                            <li>Castrado:</li>
                                        </ul>
                                    </div>
                                    <div class="co2">
                                        <ul class="list-unstyled">
                                        ';

                                        while ($row = $result2->fetch_assoc()) {
                                            $html .= '
                                                              
                                                      <li>' . $row['renian'] . '</li>
                                                      <li>' . $row['edad'] . '</li>
                                                      <li>' . $row['sexo'] . '</li>
                                                      <li>' . $row['peso'] . ' Kg</li>
                                                      <li>' . $row['nombre_raza'] . '</li>
                                                      <li>' . $row['esterilizado'] . '</li>
                                                      
                                                  ';
                                          }
                                          $html .= ' </ul>
                                </span>
                            </div>
                        </div>

               

                </div>
                <div class="card-carnet">
                    <div class="row carnet-tit">
                        <h1>CARNET DE SALUD</h1>
                    </div>
                    <div class="container-carnet">
                        <div class="card carnet-data">
                            <div class="row header-tabla">
                                <img src="../../imagenes/PHlogo.png" alt="logo" class="col">
                                <span class="col" style="color: #ffffff;">Mis vacunas</span>
                                <img src="../../imagenes/PHlogo.png" alt="logo" class="col">
                            </div>
                            <div class="row carnet-tabla">
                                <div class="row table-data">
                                    <table class="table table-borderless table-striped table-responsive text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Lote</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Proxima</th>
                                                <th scope="col" class="th">Observación</th>
                                                <th scope="col" class="th">Restricción</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                        while ($row = $result->fetch_assoc()) {
                                            $html .= '<tr>
                                                              
                                                      <td>' . $row['fecha'] . '</td>
                                                      <td>' . $row['lote'] . '</td>
                                                      <td>' . $row['tipo'] . '</td>
                                                      <td>' . $row['proxima'] . '</td>
                                                      <td>' . $row['observacion'] . '</td>
                                                      <td>' . $row['restriccion'] . '</td>
                                                      
                                                  </tr>';
                                          }
                                          $html .= ' 
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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