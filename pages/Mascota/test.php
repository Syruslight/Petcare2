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
    body {
        font-family: Arial, sans-serif;
        color: #333333;
    }

    .container {
        background-color: #ffffff;
        padding: 20px;
    }

    .card-mascota {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-carnet {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        margin-bottom: 20px;
    }

    .img-card {
        text-align: center;
        margin-bottom: 20px;
    }

    .img-card img {
        width: 200px;
        height: auto;
        border-radius: 50%;
    }

    .card-body {
        display: flex;
        justify-content: space-between;
    }

    .card-text {
        display: flex;
        flex-direction: column;
    }

    .co1,
    .co2 {
        flex: 1;
    }

    .list-unstyled {
        padding-left: 0;
        margin-top: 0;
        margin-bottom: 0;
    }

    .list-unstyled li {
        margin-bottom: 10px;
        list-style: none;
    }

    .carnet-tit {
        text-align: center;
        margin-bottom: 20px;
    }

    .table-data {
        margin-top: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 8px;
    }

    .table thead {
        background-color: #333333;
        color: #ffffff;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
<section class="moda modalMascota modalMascotaCarne">
    <div  id="modal-Carnet">

        <div class="container">
            
            <div class="row mascota-container">
                <div class="card-mascota">
                    <div class="card">

                        <div class="card-body">
                        <div class="card-text">
                        <div class="co1">
                        <ul>';
                        while ($row = $result2->fetch_assoc()) {
                            $html .= ' <li> 
                                        <div>
                                        <span class="label">Renian:</span>
                                        <span class="value">'. $row['renian'] . ' </span>
                                        </div> 
                                        </li>
                                        <li> 
                                        <div>
                                        <span class="label">Edad:</span>
                                        <span class="value">'. $row['edad'] . ' </span>
                                        </div> 
                                        </li>
                                        <li> 
                                        <div>
                                        <span class="label">Sexo:</span>
                                        <span class="value">'. $row['sexo'] . ' </span>
                                        </div> 
                                        </li>
                                        <li> 
                                        <div>
                                        <span class="label">Peso:</span>
                                        <span class="value">'. $row['peso'] . ' Kg. </span>
                                        </div> 
                                        </li>
                                        <li> 
                                        <div>
                                        <span class="label">Raza:</span>
                                        <span class="value">'. $row['nombre_raza'] . ' </span>
                                        </div> 
                                        </li>
                                        <li> 
                                        <div>
                                        <span class="label">Esterilizado:</span>
                                        <span class="value">'. $row['esterilizado'] . ' </span>
                                        </div> 
                                        </li>';}

$html .= '</ul>
        </div>
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
                <img src="../../../imagenes/PHlogo.png" alt="logo" class="col">
                <span class="col">Mis vacunas</span>
                <img src="../../../imagenes/PHlogo.png" alt="logo" class="col">
            </div>
            <div class="row carnet-tabla">
                <div class="row table-data">
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
                                $html .= '<tr>
                                            <td>' . $row['fecha'] . '</td>
                                            <td>' . $row['lote'] . '</td>
                                            <td>' . $row['tipo'] . '</td>
                                            <td>' . $row['proxima'] . '</td>
                                            <td>' . $row['observacion'] . '</td>
                                            <td>' . $row['restriccion'] . '</td>
                                        </tr>';
                            }

                        $html .= '</tbody>
                        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</body>
</html>';

$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream();
?>