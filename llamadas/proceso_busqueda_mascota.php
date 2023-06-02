<?php
// Conexión a la base de datos (ajusta los datos de conexión según tu configuración)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'petcare';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die('Error de conexión: ' . $conn->connect_error);
}

// Obtener el término de búsqueda enviado por Ajax
$query = $_POST['query'];
$idCliente = $_POST['idCliente'];

// Realizar la consulta a la base de datos
$sql = "SELECT * FROM mascota WHERE nombre LIKE '%$query%' AND idcliente LIKE '%$idCliente%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Construir la tabla de resultados
  $output = '<thead>
                <tr>
                    <th class="toget">Imagen</th>
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
    $output .= '<tr>
                  <td class="toget"><img src="../../imagenes/fotosperfil/mascota/'.$row['fotoPerfil'].'" alt="" class="dimg">
                  </td>
                  <td>' . $row['nombre'] . '</td>
                  <td>' . $row['fechaNac'] . '</td>
                  <td>' . $row['etapa'] . '</td>
                  <td>' . $row['peso'] . '</td>
                  <td>' . $row['color'] . '</td>
                  <td class="th">'. $row['esterilizado'] .'</td>
                  <td class="td">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditar_'.$row['id'].'">
                      Editar
                    </button>

                    <!-- Modal Editar -->
                    <div class="modal fade" id="modalEditar_'.$row['id'].'" tabindex="-1" aria-labelledby="modalEditar_'.$row['id'].'" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Editar Mascota</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <!-- Contenido del formulario de edición -->
                            <form action="../../llamadas/proceso_registromascota.php" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="mascota_id" value="'.$row['id'].'">
                              <div class="mb-3">
                                <label for="nombreMascota" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombreMascota" name="nombreMascota" placeholder="Nombre" value="'.$row['nombre'].'">
                              </div>
                              <div class="mb-3">
                                <label for="peso" class="form-label">Peso</label>
                                <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso" value="'.$row['peso'].'">
                              </div>
                              <div class="mb-3">
                                <label for="edad" class="form-label">Edad</label>
                                <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" disabled value="'.$row['etapa'].'">
                              </div>
                              <div class="mb-3">
                                <label for="etapa" class="form-label">Etapa</label>
                                <select class="form-select" id="etapa" name="etapa">
                                  <option value="Cria" '.($row['etapa'] == "Cria" ? "selected" : "").'>Cría</option>
                                  <option value="Juvenil" '.($row['etapa'] == "Juvenil" ? "selected" : "").'>Juvenil</option>
                                  <option value="Adulto" '.($row['etapa'] == "Adulto" ? "selected" : "").'>Adulto</option>
                                </select>
                              </div>
                              <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="esterilizado" name="esterilizado" value="SI" '.($row['esterilizado'] == "SI" ? "checked" : "").'>
                                <label class="form-check-label" for="esterilizado">Esterilizado</label>
                              </div>
                              <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" name="editar" class="btn btn-primary">Guardar cambios</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
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
