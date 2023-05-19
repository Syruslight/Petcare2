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
            <div class="first-seccion">
                <div class="logo">
                    <img src="../../imagenes/perfilVeterinario/logo.png" alt="Logo" width="168" height="46">
                </div>
                

                    <img src="" alt="profile" width="217"
                        height="227">
                    <div class="profile-information">

                        <span class="user">
                          
                        <img class="image-profile" src="../../imagenes/perfilVeterinario/pencil.png" alt="pencil" width="32"
                            height="30">
                    </div>
                    <span class="id"> 
                
            </div>
            <div class="second-seccion">
                <div class="categories">
                    <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/health-data.png" width="25" height="25" />
                        <span class="principal">Principal</span>
                    </div>
                    <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/conference-call--v1.png" width="25" height="25" />
                        <span class="list">Mis mascotas</span>
                    </div>
                    <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/chat-message-sent.png" width="25" height="25" />
                        <span class="list">Productos</span>
                    </div>
                    <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/database--v1.png" width="25" height="25" />
                        <span class="list">Servicios</span>
                    </div>
                    <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/appointment-reminders--v1.png" width="25"
                            height="25" />
                        <span class="list">PetiPuntos </span>
                    </div>
                    <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/settings--v1.png" width="25" height="25" />
                        <span class="list">Reserva una cita</span>
                    </div>
                    <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/help--v1.png" width="25" height="25" />
                        <span class="list">Ayuda</span>
                    </div>


                    <div class="sign-off">

                        <img src="https://img.icons8.com/ios/50/null/shutdown--v1.png" width="25" height="25" />
                        <span class="list">Cerrar sesion</span>

                    </div>
                </div>
            </div>
        </div>


        <div class="dash-information">
            <div class="dash-header">
                <span class="tittle-header">Luis Alberto :V</span>
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
  <p class="textobusqueda">Ingrese el RENIAN de la mascota:</p>
  <input type="search" name="busqueda" id="busqueda" class="busqueda" required>
  <br>
  <input type="text" name="idMascota" id="idMascota" placeholder="ID Mascota" readonly>
  <div class="grupotex">
  <input type="text" name="nombreMascota" id="nombreMascota" placeholder="Nombre de la mascota" readonly>
  </div>
  <input type="search" name="busqueda2" id="busqueda2" class="busqueda" required>
  <br>
  <input type="text" name="idVacuna" id="idVacuna" placeholder="ID Mascota" readonly>
</form>

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
              var idMascota = result[0];
              var nombreMascota = result[1];

              // Actualizar los valores de los campos del formulario
              $('#idMascota').val(idMascota);
              $('#nombreMascota').val(nombreMascota);
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
----------------------------------------------------------


<form action="" method="post">
                <div class="grupotex">
                    <label for="" class="etiqueta_nombre">Tipo:</label>
                    <input type="texto" name="" id="" class="ingreso_datos">
                </div>
                <div class="grupotex">

                    <label for="" class="etiqueta_nombre">Proxima fecha:</label>
                    <input type="date" name="" id="" class="ingreso_datos">
                </div>
                <div class="grupotex">
                    <label for="" class="etiqueta_nombre">Observación</label>
                    <input type="text" name="" id="" class="ingreso_datos">
                </div>
                <label for="" class="etiqueta_nombre">Restricciones</label>
                <input type="text" name="" id="" class="ingreso_datos">


            </form>

            <script src="../../../js/modalCliente.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="../../../js/swiperAdmin.js"></script>
        </body>


</html>