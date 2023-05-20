<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
// Iniciar la sesión
session_start();
?>
<<<<<<< HEAD

=======
>>>>>>> 8d6e59ffb25640aacc847485a7bec70adcd9168e
<head>
  <meta charset="utf-8">
  <title>Formulario Multipasos :: Urian Viera</title>
  <link rel="stylesheet" href="registroNewUs.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
<<<<<<< HEAD
  <div class="container"><br>
    <header>Bienvenido a Pet & Care</header>
    <p class="parrafo">Completa los siguientes para enterarte</p>
    <p class="parrafo">de las novedades que tenemos que tenemos para ti</p>
<br>
=======
  <div class="container">
    <header>Bienvenido Usuario Nuevo</header>
    <div class="progress-bar">
      <div class="step">
        <p>Paso 1</p>
        <div class="bullet">
          <span>1</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>Paso 2</p>
        <div class="bullet">
          <span>2</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>Paso 3</p>
        <div class="bullet">
          <span>3</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
      <div class="step">
        <p>Fin</p>
        <div class="bullet">
          <span>4</span>
        </div>
        <div class="check fas fa-check"></div>
      </div>
    </div>
>>>>>>> 8d6e59ffb25640aacc847485a7bec70adcd9168e
    <div class="form-outer">

      <!--Formulario para registrar usuario nuevo-->
      <form action="../../llamadas/proceso_registrodatos.php" method="post" enctype="multipart/form-data">

        <!--Se realizan 4 divisiones-->

<<<<<<< HEAD
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
              <input class="textbox1" type="text" name="nombres">
            </div>
            <div class="field">
              <div class="label">Apellidos:</div>
              <input class="textbox2" type="text" name="apellidos">
            </div>

          </div>

          <div class="primary-container1">
            <div class="field">
              <div class="label">DNI:</div>
              <input type="text" name="dni">
            </div>
            <div class="field">
              <div class="label">Fecha de Nacimiento</div>
              <input type="date" name="fechaNac">
            </div>
          </div>


          <div class="primary-container2">
            <div class="field">
              <div class="label">Genero</div>
              <select name="sexo">
                <option>Masculino</option>
                <option>Femenino</option>
              </select>
            </div>
            <div class="field">
              <div class="label">Número telefónico</div>
              <input type="tel" name="telefono" id="">
            </div>

          </div>


          <div class="texDir">
            <div class="field">
              <div class="label">Dirección:</div>
              <input type="text" name="direccion">
            </div>
          </div>



          <div class="field btns">
            <button class="prev-3 prev BtnSen">Enviar</button>
=======
        <div class="page slide-page">
          <div class="title">Seleccionar una foto</div>
          <div class="fotoPos">
            <div class="foto">
            <img src="https://lh5.googleusercontent.com/proxy/9vqIPeIeHQHyGEo43DlSgD-DUtidieclv56O6UoAcYNGPXGNnZwFJL2V7oSodehCB1YT28jit7pMSVjNTnrBOnlBxW0CiRmOeH22FlPockzEbfdQPHLkDMPcgMwWdNfVHF1r2QpUk6W_aY_J87A9lFtYKMHf8_xhkMB7l_4=s0-d" alt="avatar" id="img">
          </div>  
          <input id="foto" type="file" name="foto">
          <label for="foto">Cambiar foto</label>
        
        </div>
          <input id="email" type="hidden" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
          <input id="idUser" type="hidden" name="idUsuario" value="<?php echo isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario'] : ''; ?>">
          <input id="idUser" type="hidden" name="tipoUsuario" value="<?php echo isset($_SESSION['tipoUsuario']) ? $_SESSION['tipoUsuario'] : ''; ?>">
          <div class="field">
            <button class="firstNext next">Siguiente</button>
          </div>

        </div>

        <div class="page">
          <div class="title">Datos de usuario</div>
          <div class="field">

            <div class="label">Nombres:</div>
            <input type="text" name="nombres">
          </div>
          <div class="field">
            <div class="label">Apellidos:</div>
            <input type="text" name="apellidos">
          </div>
          <div class="field">
            <div class="label">DNI:</div>
            <input type="text" name="dni">
          </div>
          <div class="field btns">
            <button class="prev-1 prev">Atrás</button>
            <button class="next-1 next">Siguiente</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Datos de usuario</div>
          <div class="field">
            <div class="label">Fecha de Nacimiento</div>
            <input type="date" name="fechaNac">
          </div>
          <div class="field">
            <div class="label">Genero</div>
            <select name="sexo">
              <option>Masculino</option>
              <option>Femenino</option>
            </select>
          </div>
          <div class="field btns">
            <button class="prev-2 prev">Atrás</button>
            <button class="next-2 next">Siguiente</button>
          </div>
        </div>

        <div class="page">
          <div class="title">Información de contacto</div>
          <div class="field">
            <div class="label">Dirección:</div>
            <input type="text" name="direccion">
          </div>
          <div class="field">
            <div class="label">Número telefónico</div>
            <input type="tel" name="telefono" id="">
          </div>
          <div class="field btns">
            <button class="prev-3 prev">Atrás</button>
            <button class="submit">Enviar</button>
>>>>>>> 8d6e59ffb25640aacc847485a7bec70adcd9168e
          </div>
        </div>
      </form>



<<<<<<< HEAD

=======
>>>>>>> 8d6e59ffb25640aacc847485a7bec70adcd9168e
    </div>
  </div>
  <script src="../../js/registroNewUs.js"></script>

</body>

</html>