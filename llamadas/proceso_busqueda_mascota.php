<?php
require('../controlador/conexion.php');
$conn = conectar();

// Obtener el término de búsqueda enviado por Ajax
$query = $_POST['query'];
$idCliente = $_POST['idCliente'];

session_start();
// Realizar la consulta a la base de datos
$sql = "SELECT *, CONCAT(
  FLOOR(DATEDIFF(CURRENT_DATE(), mascota.fechaNac) / 365), ' años ') 
  AS edad FROM mascota WHERE nombre LIKE '%$query%' AND idcliente LIKE '%$idCliente%' LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Construir la tabla de resultados
  $output = '<thead>
                <tr>
                    <th class="toget">Imagen</th>
                    <th>IdMascota</th>
                    <th>Nombre</th>
                    <th>Fecha registro</th>
                    <th>Edad</th>
                    <th>Peso</th>
                    <th>Color</th>
                    <th class="th">Esterilizado</th>
                    <th class="td">Acción</th>
                </tr>
            </thead>
            <tbody>';

  while ($row = $result->fetch_assoc()) {
    $_SESSION['idEditarmascota'] = 4;
    $output .= '<tr>
              <td class="toget"><img src="../../imagenes/fotosperfil/mascota/' . $row['fotoPerfil'] . '" alt="" class="dimg">
              </td>
              <td>' . $row['idmascota'] . '</td>
              <td>' . $row['nombre'] . '</td>
              <td>' . $row['fechaNac'] . '</td>
              <td>' . $row['edad'] . '</td>
              <td>' . $row['peso'] . ' Kg</td>
              <td>' . $row['color'] . '</td>
              <td class="th">' . $row['esterilizado'] . '</td>
              <td class="td">
                <a href="" action="listar" class="butModal btn btn-sm" data-modal=".modalMascotaEdit"      
                style="background-color:#1BC5BD; color:#1D3534;">editar</a>
                <a href="" class="butModal btn btn-sm" data-modal=".modalMascotaCarne"
                style="background-color:#1D3534; color:#1BC5BD;">Ver Carnet</a>
              </td>
          </tr>';
  }

  $output .= '</tbody>';
  echo $output;
} else {
  echo '<tr><td colspan="8" class="text-center">No se encontraron mascotas</td></tr>';
}

$conn->close();
?>
