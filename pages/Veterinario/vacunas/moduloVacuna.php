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

        <button class="add-newProduct" onclick="openModalVacuna()">+ Generar Vacuna</button>
        <button class="add-newCategory" onclick="openModalLote()">+ Agregar Lote</button>
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