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
  <link rel="stylesheet" href='../editarVeterinario/estiloModalVeterinario.css'>
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

      <div class="HeaderVacuna">
        <h1 class="tittle-products"> Registro de lotes <p>Bienvenido Dr(a). <?= $value[0] ?> <?= $value[1] ?></p>
        </h1>

        <button class="add-newCategory" onclick="openModalLote()">+ Agregar Lote</button>
      </div>


      <div class="contForm">

        <div class="contenedorLote">

          <div class="contLoteTable">
          <?php
$sql = "SELECT * FROM vacuna ORDER BY idvacuna DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tablaLotes'>";
    echo '<thead>';
    echo '<tr>';
    echo '<th>N°</th>';
    echo '<th>Lote</th>';
    echo '<th>Nombre</th>';
    echo '<th>Descripción</th>';
    echo '<th>Estado</th>';
    echo '<th>Acción</th>';
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
        echo "<td>";
        echo "<label class=\"toggle-container\">";
        echo "<input type=\"checkbox\" onchange=\"toggleStatus(this)\"";
        
        // Comparar el estado actual con el estado original almacenado en la base de datos
        $sql_estado = "SELECT estadoLote FROM vacuna WHERE idvacuna = " . $row['idvacuna'];
        $result_estado = $conn->query($sql_estado);
        
        if ($result_estado && $result_estado->num_rows > 0) {
            $row_estado = $result_estado->fetch_assoc();
            if ($row_estado['estadoLote'] == $row['estadoLote']) {
                echo " disabled";
            }
        }
        
        // Resto del código para el botón de alternancia
        if ($row['estadoLote'] == 1) {
            echo " checked";
        }
        
        echo ">";
        echo "<span class=\"toggle-slider\"></span>";
        echo "<span class=\"status\">" . ($row['estadoLote'] == 1 ? 'Activado' : 'Desactivado') . "</span>";
        echo "</label>" . '</td>';
        echo '<td>';
        echo '<div class="contenedorAccion">';
        echo '<img class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width="45" height="40">';
        echo '</div>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "<tr><td colspan=\"6\">No se encontraron registros.</td></tr>";
}
?>



          </div>


        </div>



      </div>

    </div>
  </div>

<?php
  include('../editarVeterinario/modalEditarVeterinario.php');
  ?>
  <?php
  include('formularioVacuna.php');
  ?>
  <?php
  include('formularioLotes.php');
  ?>
 


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
  <script src="../../../js/Interacciones.js"></script>
  <script src="../../../js/modalCliente.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="../../../js/swiperAdmin.js"></script>
</body>


</html>