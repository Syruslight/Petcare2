<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
// Iniciar la sesión
session_start();
?>
<head>
  <meta charset="utf-8">
  <title>Formulario Multipasos :: Urian Viera</title>
  <link rel="stylesheet" href="registroNewUs.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
  <div class="container"><br>
    <header>Bienvenido a Pet & Care</header>
    <p class="parrafo">Completa los siguientes para enterarte</p>
    <p class="parrafo">de las novedades que tenemos que tenemos para ti</p>
<br>
    <div class="form-outer">

      <!--Formulario para registrar usuario nuevo-->
      <form action="../../llamadas/proceso_registrodatos.php" method="post" enctype="multipart/form-data">

        <!--Se realizan 4 divisiones-->

        <div class="page">
          <div class="fotoPos">
            <div class="foto">
              <img
                src="https://lh5.googleusercontent.com/proxy/9vqIPeIeHQHyGEo43DlSgD-DUtidieclv56O6UoAcYNGPXGNnZwFJL2V7oSodehCB1YT28jit7pMSVjNTnrBOnlBxW0CiRmOeH22FlPockzEbfdQPHLkDMPcgMwWdNfVHF1r2QpUk6W_aY_J87A9lFtYKMHf8_xhkMB7l_4=s0-d"
                alt="avatar" id="img">
            </div>
            <input id="foto" type="file" name="foto" hidden>
            <label id="cambiar-foto" for="foto"><img class="image-profile"
                src="../../../imagenes/perfilAdmin/pencil.png" alt="pencil" width="32" height="30"></label>


            <input id="email" type="hidden" name="email"
              value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
            <input id="idUser" type="hidden" name="idUsuario"
              value="<?php echo isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario'] : ''; ?>">
            <input id="idUser" type="hidden" name="tipoUsuario"
              value="<?php echo isset($_SESSION['tipoUsuario']) ? $_SESSION['tipoUsuario'] : ''; ?>">
          </div>

          <div class="primary-container">
            <div class="field">
              <div class="label">Nombres:</div>
              <input class="textbox1" type="text" name="nombres" required>
            </div>
            <div class="field">
              <div class="label">Apellidos:</div>
              <input class="textbox2" type="text" name="apellidos" required>
            </div>

          </div>

          <div class="primary-container1">
            <div class="field">
              <div class="label">DNI:</div>
              <input type="text" name="dni" required>
            </div>
            <div class="field">
              <div class="label">Fecha de Nacimiento</div>
              <input type="date" name="fechaNac" required>
            </div>
          </div>


          <div class="primary-container2">
            <div class="field">
              <div class="label">Genero</div>
              <select name="sexo" required>
                <option required>Masculino</option>
                <option required>Femenino</option>
              </select>
            </div>
            <div class="field">
              <div class="label">Número telefónico</div>
              <input type="tel" name="telefono" id="" required>
            </div>

          </div>


          <div class="texDir">
            <div class="field">
              <div class="label">Dirección:</div>
              <input type="text" name="direccion" required>
            </div>
          </div>



          <div class="field btns">
            <button class="prev-3 prev BtnSen">Enviar</button>
          </div>
        </div>
      </form>



    </div>
  </div>
  <script src="../../js/registroNewUs.js"></script>

</body>

</html>