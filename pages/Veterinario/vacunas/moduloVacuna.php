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

      <div class="HeaderVacuna">
        <h1 class="tittle-products"> Registro de vacunas
          <p>Realizado por el Dr. <?= $value[0] ?> <?= $value[1] ?></p>
        </h1>

        <button class="add-newProduct" onclick="openModalVacuna()">+ Agregar Lote</button>
        <button class="add-newCategory" onclick="openModalLote()">+ Generar Vacuna</button>
      </div>

      <div class="container">
      <?php
  
      $idVeterinario = $value[7];
          // Realiza la consulta para mostrar los campos requeridos en una tabla
          $sql = "SELECT detallevacuna.*, mascota.renian, mascota.nombre, vacuna.lote, vacuna.tipo, veterinario.nombres, veterinario.apellidos
                  FROM detallevacuna
                  JOIN mascota ON detallevacuna.idmascota = mascota.idmascota
                  JOIN vacuna ON detallevacuna.idvacuna = vacuna.idvacuna
                  JOIN veterinario ON detallevacuna.idveterinario = veterinario.idveterinario
                  WHERE detallevacuna.idveterinario =  $idVeterinario 
                  ORDER BY detallevacuna.iddetallevacuna DESC";
      
          $result = $conn->query($sql);
      
          // Verifica si se obtuvieron resultados
          if ($result->num_rows > 0) {
            $numero = $result->num_rows;
              echo "<table>";
              echo "<tr>";
              echo "<th>N°</th>";
              echo "<th>Lote</th>";
              echo "<th>Tipo</th>"; 
              echo "<th>Renian</th>";
              echo "<th>Nombre Mascota</th>";
              echo "<th>Fecha Aplicada</th>";
              echo "<th>Proxima Fecha</th>";
              echo "<th>Observación</th>";
              echo "<th>Restricciones</th>";
              echo "</tr>";

              // Itera sobre los resultados y muestra los datos en la tabla
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $numero . "</td>";
                  echo "<td>" . $row['lote'] . "</td>";
                  echo "<td>" . $row['tipo'] . "</td>";
                  echo "<td>" . $row['renian'] . "</td>";
                  echo "<td>" . $row['nombre'] . "</td>";
                  echo "<td>" . $row['fecha'] . "</td>";
                  echo "<td>" . $row['proxFecha'] . "</td>";
                  echo "<td>" . $row['observacion'] . "</td>";
                  echo "<td>" . $row['restricciones'] . "</td>";
                  echo "</tr>";
          
                  $numero--; // Incrementar el contador en cada iteración
              }
          
              echo "</table>";
          } else {
              echo "No se encontraron resultados.";
          }
                  ?>
     
          
      </div>

    </div>
  </div>


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
                var tipoVacuna = result[1];
                // Actualizar los valores de los campos del formulario
                $('#idVacuna').val(idVacuna);
                $('#tipoVacuna').val(tipoVacuna);
              } else {
                // Limpiar los campos si no se encontraron resultados
                $('#idVacuna').val('');
                $('#tipoVacuna').val('');
              }
            }
          });
        } else {
          // Limpiar los campos si no hay entrada de búsqueda
          $('#idVacuna').val('');
          $('#tipoVacuna').val('');
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