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
margin: 3px;
padding: 3px;
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
background-color: #0b5e50;
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
    $nombreMascota = $row['nombre_mascota'];

    $html .= '<div class="tituloDocumento">
    <h1>HISTORIAL VETERINARIO DE '.$row['nombre_mascota'].'</h1>
    <p>Sr(a) '.$row['nombres'].' '.$row['apellidos'].' en Pet&Care nos preocupamos por el bienestar de sus mascotas.  </p>
    <p>Por eso recuerde que no existe vacuna que dure toda la vida, por ello es necesario poner refuerzo  </p>
    <p>a nuestra mascota, tanto cachorros y adultos.</p>
</div>
<div class="contenedorImgTexto"> 
<table class="tablaDatos">
<tr>
<td class="td1">
 <div class="contenedorTexto">
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
   
                <img src="../../../imagenes/PHlogo.png" alt="logo" class="col">
                <span class="col">Mis vacunas</span>
                <img src="../../../imagenes/PHlogo.png" alt="logo" class="col">
           
           
                    <table class="table table-borderless table-striped table-responsive text-center">
                        <thead>
                            <tr>
                                <th scope="col">Fecha Aplicada</th>
                                <th scope="col">Lote</th>
                                <th scope="col">Vacuna</th>
                                <th scope="col">Próxima Fecha</th>
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
$dompdf->setPaper('A4', 'portrait');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
//Concatenas el nombre de la mascota + el nombre en una nueva variable
$nommbreDocumento = "CarnetMascota" . "$nombreMascota" . ".pdf";
//asginas el nuevo nombre del pdf a la variable
$dompdf->stream($nommbreDocumento);
?>
