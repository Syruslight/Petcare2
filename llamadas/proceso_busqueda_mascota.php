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
                <a href="" class="butModal btn btn-sm" data-modal=".modalMascotaEdit"
                style="background-color:#1BC5BD; color:#1D3534;">editar</a>
            <a href="" class="butModal btn btn-sm" data-modal=".modalMascotaCarne"
                style="background-color:#1D3534; color:#1BC5BD;">Ver Carnet</a>
                </td>
              </tr>
              
              
              <!-- MODAL EDITAR -->
              <section class="moda modalMascota modalMascotaEdit">
                      <div class="row" id="modal-Register" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.2), rgba(0,0,0,0.2)),url(../../imagenes/perroCarrusel.jpg);">
                      <div class=" container">
                          <div class="row header-ReMas justify-content-end">
                              <div class="row close-btn">
                                  <span class="btn btn-dark modal__close" style="width: 50px;">X</span>
                              </div>
              
                              <div class="row">
                                  <h3 class="mb-4"><span>Editar Mascota</span></h3>
                              </div>
                          </div>
                          <div class="row data">
                              <form action="../../llamadas/proceso_registromascota.php" method="post"
                                  enctype="multipart/form-data">
                                  <div class="data-col2">
                                      <input type="text" id="nombre" class="form-control" name="nombreMascota" placeholder="Nombre">    
                                      <div class="row-short">
                                          <input type="text" class="form-control ip" name="peso" placeholder="Peso">
                                          <input type="text" class="form-control" style="width: 109px;" id="edad" name="edad" placeholder="Edad" disabled>
                                      </div>                   
                                      <div class="cont-radio">
                                          <select name="etapa" id="etapa" value="etapa" class="form-select" style="width: 193px;">
                                              <option selected>Selecciona Etapa</option>
                                              <option value="Cria">Cría</option>
                                              <option value="Juvenil">Juvenil</option>
                                              <option value="Adulto">Adulto</option>
                                          </select>
                                          <div class="cont-este">
                                              <label class="form-check-label">Esterilizado:</label>
                                              <input type="radio" name="esterilizado" class="form-check-input" id="si" value="SI">
                                              <label class="form-check-label" for="si">Si</label>
                                              <input type="radio" name="esterilizado" class="form-check-input" id="no" value="NO">
                                              <label class="form-check-label" for="no">No</label>
                                          </div>
                                      </div>
                                      <div class="button">
                                              <input type="submit" name="editar" value="Editar" class="btn">
                                          </div>
                                  </div>
          
          
                                  <div class="data-col1">
                                      <div class="row">
                                          <input class="form-control form-control-sm" id="foto" type="file" name="foto">
                                      </div>
                                      <div class="row">
                                          <div class="fotoPos">
                                              <div class="foto"></div>
                                          </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
          
                      </div>
                      </div>
                  </section>
              '
              
              ;
            }
            

  $output .= '</tbody>';
} else {
  // No se encontraron resultados
  echo $idCliente;
  $output = 'No se encontraron resultados.';
}

// Devolver los resultados al cliente
echo $output;

// Cerrar la conexión a la base de datos
$conn->close();
?>