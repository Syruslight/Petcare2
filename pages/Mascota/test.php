<?php
// Incluir la clase Dompdf
require_once '../../libreria/dompdf/autoload.inc.php';
require('../../controlador/conexion.php');

$conn = conectar();

use Dompdf\Dompdf;

$idmascota = $_GET['idmascota'];

$sentencia = "SELECT vac.fecha as fecha, vac.lote as lote, vac.tipo as tipo, dv.proxFecha as proxima, dv.observacion as observacion, dv.restricciones as restriccion, CONCAT(v.nombres,' ',v.apellidos) as nombreVeterinario 
FROM detallevacuna dv 
JOIN mascota m on dv.idmascota= m.idmascota
JOIN veterinario v ON dv.idveterinario= v.idveterinario
JOIN vacuna vac ON dv.idvacuna= vac.idvacuna
WHERE m.idmascota = $idmascota";

$sentencia2 = "SELECT UPPER(mascota.nombre) AS nombre_mascota, mascota.fotoPerfil, 
CONCAT(
    FLOOR(DATEDIFF(CURRENT_DATE(), mascota.fechaNac) / 365), ' años, ',
    FLOOR((DATEDIFF(CURRENT_DATE(), mascota.fechaNac) % 365) / 30), ' meses, ',
    DATEDIFF(CURRENT_DATE(), mascota.fechaNac) % 30, ' días'
) AS edad, mascota.sexo, mascota.peso, raza.nombre AS nombre_raza, mascota.esterilizado, mascota.renian,
cliente.apellidos, cliente.nombres
FROM mascota 
INNER JOIN raza ON mascota.idraza = raza.idraza
INNER JOIN cliente ON mascota.idcliente = cliente.idcliente
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
    <link rel="stylesheet" href="estiloPDFMascota.css">
    <style>
    .tituloDocumento{
      justify-content: center;

      text-align: center;
  }

  .tituloDocumento p{
color: grey;
}

.tituloDocumento{
  justify-content: center;

  text-align: center;
}

.tituloDocumento p{
color: grey;
}

* {
margin: 0px;
box-sizing: border-box;
}

.contenedorImgTexto {
margin: 20px;
display: flex;
justify-content: space-between;
align-items: center;
background-color: #f2f2f2;
padding: 20px;
border-radius: 10px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.contenedorTexto {
width: auto;
display: flex;
flex-direction: column;
gap: 10px;
}
.td1 {
width: 70%;
align-items: center;
flex: 1; /* Ocupa todo el espacio disponible */
}

.td2 {
width: auto;
float: right;

}
ul {
list-style: none;
padding: 0;
margin: 0;
}

.label {
font-weight: bold;
color: #000000;
}


.value {
color: #0b5e50;
}

.imageWrapper {
position: relative;
/* Ajusta el tamaño del contenedor según tus necesidades */
height: 180px; /* Ajusta el tamaño del contenedor según tus necesidades */
overflow: hidden;
border-radius: 15px;
display: flex;
align-items: center;
justify-content: center;


}

.profile-image {

border: 2px solid rgb(214, 214, 214);
border-radius: 15px;
width: auto;
height: 100%;
justify-content: center;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra */

}
.tablaDatos{

width: 100%;
}
.td2 .imageWrapper {
  text-align: center;
}

.td2 .imageWrapper .profile-image {
  display: block;
  margin: 0 auto;
}

.carnet-tit {
  text-align: center;
  margin-bottom: 20px;
}

.carnet-tit h1 {
  font-size: 24px;
  font-weight: bold;
}
.tabla-container {
  margin: 0 20px; /* Aplica un margen de 20px tanto en el lado derecho como en el lado izquierdo */
}

.tablaVacuna {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.tablaVacuna th,
.tablaVacuna td {
  border: 1px solid #ddd;
  padding: 12px;
  text-align: center;
}

.tablaVacuna th {
  background-color: #f2f2f2;
  font-weight: bold;
}

.tablaVacuna tr:nth-child(even) {
  background-color: #f9f9f9;
}

.tablaVacuna tr:hover {
  background-color: #eaeaea;
}

.tablaVacuna th:first-child,
.tablaVacuna td:first-child {
  text-align: left;
}

.tablaVacuna .th {
  font-weight: bold;
}

.logoIcono {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  width: 100%;
  height: 60px;
  background-color: #333333;
  z-index: 9999;
  margin-bottom: 20px;
  }

.logoImagen {
  margin-top: 7px;
  width: auto;
  height: 45px;
  object-fit: contain;
  margin-left: 92%;
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


    $imagenLogo = '../../imagenes/gatito.jpg';

    // Leer el contenido de la imagen
    $imagenData = file_get_contents($imagenLogo);

    // Convertir la imagen a base64
    $logobase64 = base64_encode($imagenData);



    $nombreMascota = $row['nombre_mascota'];

    $html .= '
    <div class="logoIcono">
    <img class="logoImagen" src="data:image/jpeg;base64,' . $logobase64 . '">
                </div>
    <div class="tituloDocumento">
    <h1>HISTORIAL VETERINARIO DE '.$row['nombre_mascota'].'</h1>
    <p>Sr(a) '.$row['nombres'].' '.$row['apellidos'].' a continuación presentamos el carnet de vacunación</p>
</div>
<div class="contenedorImgTexto"> 
<table class="tablaDatos">
<tr>
<td class="td1">
 <div class="contenedorTexto">
 <h3>Datos de la mascota:</h3>

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
</td>
<td  class="td2">
 <div class="imageWrapper">
    <img class="profile-image" src="data:image/jpeg;base64,' . $imagen_base64 . '">
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
   
    <div class="tabla-container">    
                    <table class="tablaVacuna">
                        <thead>
                            <tr>
                                <th scope="col">Fecha Aplicada</th>
                                <th scope="col">Lote</th>
                                <th scope="col">Vacuna</th>
                                <th scope="col">Próxima Fecha</th>
                                <th scope="col" class="th">Observación</th>
                                <th scope="col" class="th">Restricción</th>
                                <th scope="col" class="th">Veterinario</th>
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
                                <td>' . $row['nombreVeterinario'] . ' </td>
                            </tr>';
}

$html .= '
                        </tbody>
                    </table>
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
//Concatenas el nombre de la mascota + el nombre en una nueva variable
$nommbreDocumento = "CarnetMascota" . "$nombreMascota" . ".pdf";
//asginas el nuevo nombre del pdf a la variable
$dompdf->stream($nommbreDocumento);
?>
