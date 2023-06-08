<?php
require('../../../controlador/conexion.php');
$conn = conectar();
?>

<?php
session_start();
$email = $_SESSION['email'];
foreach (listarVeterinario($email, $conn) as $key => $value) {
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href='../veterinario.css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Veterinario</title>
</head>

<body>

  <div class="wrapper">
    <div class="profile">
      <?php
      include('../components/navListVeterinario.php');
      ?>
    </div>


    <div class="dash-information">
      <?php
      include('../components/headerVeterinario.php');
      ?>

      <div class="contForm">
        <aside class="formVacuna">
          <div class="grupotex1">
            <h2 class="titulo_detallevac">Formulario vacuna</h2>

          </div>
          <form action="../../../llamadas/proceso_registrarDetalleVacuna.php" method="post"
            enctype="multipart/form-data">
            <label for="" class="etiqueta_nombre"> Ingrese el RENIAN de la mascota:</label>
            <div class="grupotex1">

              <input type="number_format" name="busqueda" id="busqueda" class="ingreso_datos1" required>


              <input type="text" name="nombreMascota" class="nomMascota" id="nombreMascota"
                placeholder="Nombre de la mascota" disabled>
            </div>
            <input type="text" name="idMascota" id="idMascota" placeholder="ID Mascota" hidden>
            <label for="" class="etiqueta_nombre"> Lote de Vacuna:</label>
            <input type="search" name="busqueda2" id="busqueda2" class="ingreso_datos" required>

            <input type="text" name="idVacuna" id="idVacuna" placeholder="ID vacuna" hidden>
            <input type="text" name="idVeterinario" value="   <?= $value[7] ?>" hidden>
            <div class="grupotex1">
              <div class="columna">
                <label for="" class="etiqueta_nombre2"> Fecha aplicada:</label><br>
                <label type="date" id="etiquetaFecha" class="fechaInicial"><label>
              </div>
              <div class="columna">
                <label for="" class="etiqueta_nombre2"> Proxima fecha:</label><br>
                <input type="date" name="fechaProxima" id="" class="ingreso_datos1">
              </div>

            </div>
            <div class="grupotex">
              <label for="" class="etiqueta_nombre">Observación</label>
              <textarea type="text" name="observacion" id="" class="ingresoFullText"></textarea>
            </div>
            <label for="" class="etiqueta_nombre">Restricciones</label>
            <textarea type="text" name="restriciones" id="" class="ingresoFullText"></textarea>
            <button type="submit" class="btn_envio">Agregar</button>
          </form>
        </aside>
        <div class="contenedorLote">
          <div class="contformLote">
            <form action="../../../llamadas/proceso_registrarvacuna.php">

              <h2 class="titulo_form">Registro de Lote</h2>
              <div class="grupotex">
                <label for="" class="etiqueta_nombre">Lote:</label>
                <input type="text" name="lote" id="" class="ingreso_datos">

                <label for="" class="etiqueta_nombre">Tipo:</label>
                <input type="texto" name="tipo" id="" class="ingreso_datos">
              </div>
              <div class="grupotex">
                <label for="" class="etiqueta_nombre">Descripción:</label>
                <textarea type="text" name="descripcion" id="" class="ingreso_datos"></textarea>
              </div>
              <button type="submit" class="btn_envio">Agregar</button>

            </form>
          </div>
          <div class="contLoteTable">
        
            <?php
            $sql = "SELECT * FROM vacuna order by idvacuna desc";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                echo "<table  class='tablaLotes'>";
                echo '<thead>';
                echo '<tr>';
                echo '<th>N°</th>';
                echo '<th>Lote</th>';
                echo '<th>Nombre</th>';
                echo '<th>Descripcion</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
        
                // Iterar sobre los registros y mostrarlos en la tabla
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['idvacuna'] . '</td>';
                    echo '<td>' . $row['lote'] . '</td>';
                    echo '<td>' . $row['tipo'] . '</td>';
                    echo '<td>' . $row['descripcion'] . '</td>';
                    echo '</tr>';
                }
        
                echo '</tbody>';
                echo '</table>';
            } else {
                echo 'No se encontraron registros.';
            }
    ?>
            

          </div>


        </div>



      </div>

    </div>
  </div>
  <script>
    $(document).ready(function () {
      $('#busqueda').keyup(function () {
        var query = $(this).val();

        if (query !== '') {
          $.ajax({
            url: 'proceso_busquedaMascotaRenian.php',
            method: 'POST',
            data: { query: query },
            success: function (response) {
              if (response !== 'No se encontraron resultados.') {
                // Separar la respuesta en ID y Nombre de mascota
                var result = response.split(';');
                var idMascotaRenian = result[0];
                var nombreMascotaRenian = result[1];

                // Actualizar los valores de los campos del formulario
                $('#idMascota').val(idMascotaRenian);
                $('#nombreMascota').val(nombreMascotaRenian);
              } else {
                // Limpiar los campos si no se encontraron resultados
                $('#idMascota').val('');
                $('#nombreMascota').val('');
              }
            }
          });
        } else {
          // Limpiar los campos si no hay entrada de búsqueda
          $('#idMascota').val('');
          $('#nombreMascota').val('');
        }
      });
    });
  </script>


  <script>
    $(document).ready(function () {
      $('#busqueda2').keyup(function () {
        var query = $(this).val();

        if (query !== '') {
          $.ajax({
            url: 'proceso_busquedaIdVacuna.php',
            method: 'POST',
            data: { query: query },
            success: function (response) {
              if (response !== 'No se encontraron resultados.') {
                // Separar la respuesta en ID de vacuna
                var result = response.split(';');
                var idVacuna = result[0];

                // Actualizar los valores de los campos del formulario
                $('#idVacuna').val(idVacuna);
              } else {
                // Limpiar los campos si no se encontraron resultados
                $('#idVacuna').val('');
              }
            }
          });
        } else {
          // Limpiar los campos si no hay entrada de búsqueda
          $('#idVacuna').val('');
        }
      });
    });
  </script>
  <script src="../../../js/validar.js"></script>
  <script src="../../../js/obtenerFechaActual.js"></script>
  <script src="../../../js/Modal.js"></script>
  <script src="../../../js/modalCliente.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="../../../js/swiperAdmin.js"></script>
</body>


</html>