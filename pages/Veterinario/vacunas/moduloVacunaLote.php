<?php
require('../../../controlador/conexion.php');
$conn = conectar();
?>

<?php
                session_start();
                $email = $_SESSION['email'];
                foreach (listarVeterinario($email, $conn) as $key => $value) {
                }?>
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
            <div class="dash-header">
                <span class="tittle-header"><?= $value[0] ?> <?= $value[1] ?></span>
                <!--Se abre codigo php para invocar a la sesion del 'usuario'-->
                <img src="../../imagenes/perfilVeterinario/veterinario.png" alt="profile" width="38" height="39">
            </div>


            <form action="../../../llamadas/proceso_registrarvacuna.php">
                <h2 class="titulo_form">Registro de Lote</h2>
                <div class="grupotex">
                    <label for="" class="etiqueta_nombre">Lote:</label>
                    <input type="text" name="lote" id="" class="ingreso_datos">

                </div>
                <div class="grupotex">
                    <label for="" class="etiqueta_nombre">Tipo:</label>
                    <input type="texto" name="tipo" id="" class="ingreso_datos">
                </div>
                <div class="grupotex">
                    <label for="" class="etiqueta_nombre">Descripción:</label>
                    <input type="text" name="descripcion" id="" class="ingreso_datos">
                </div>
                <button type="submit" class="btn_envio">Agregar</button>

            </form>
 
--------------------------------------------------------------
<form action="" method="post">
  <h2 class="titulo_detallevac">Formulario vacuna</h2>
  <p class="textobusqueda" >Ingrese el RENIAN de la mascota:</p>
  <input type="search" name="busqueda" id="busqueda" class="busqueda" placeholder="Renian mascota" required>
  <br>
  <input type="text" name="idMascota" id="idMascota" placeholder="ID Mascota" readonly>
  <div class="grupotex">
  <input type="text" name="nombreMascota" id="nombreMascota" placeholder="Nombre de la mascota" readonly>
  </div>
  <input type="search" name="busqueda2" id="busqueda2" class="busqueda" placeholder="lote de la vacuna" required>
  <br>
  <input type="text" name="idVacuna" id="idVacuna" placeholder="ID vacuna" readonly>
  <div class="grupotex">
<input  type="text" name="idVeterinario"  value="   <?= $value[7] ?>">
<label for="" class="etiqueta_nombre">Proxima fecha:</label>
<input type="date" name="fechaVacuna" id="" class="ingreso_datos">
</div>
<div class="grupotex">
<label for="" class="etiqueta_nombre">Observación</label>
<input type="text" name="Observacion" id="" class="ingreso_datos">
</div>
<label for="" class="etiqueta_nombre">Restricciones</label>
<input type="text" name="Restricciones" id="" class="ingreso_datos">
</form>
</div>
<script>
  $(document).ready(function() {
    $('#busqueda').keyup(function() {
      var query = $(this).val();

      if (query !== '') {
        $.ajax({
          url: 'proceso_busquedaMascotaRenian.php',
          method: 'POST',
          data: { query: query },
          success: function(response) {
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
  $(document).ready(function() {
    $('#busqueda2').keyup(function() {
      var query = $(this).val();

      if (query !== '') {
        $.ajax({
          url: 'proceso_busquedaIdVacuna.php',
          method: 'POST',
          data: { query: query },
          success: function(response) {
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

----------------------------------------------------------



            <script src="../../../js/modalCliente.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="../../../js/swiperAdmin.js"></script>
        </body>


</html>