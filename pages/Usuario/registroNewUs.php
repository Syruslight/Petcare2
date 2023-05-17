<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario Multipasos :: Urian Viera</title>
    <link rel="stylesheet" href="registroNewUs.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
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
      <div class="form-outer">

        <!--Formulario para registrar usuario nuevo-->
        <form action="#">

<!--Se realizan 4 divisiones-->

          <div class="page slide-page">
            <div class="title">Seleccionar una foto</div>
            <div class="fotoPos">
              <div class="foto"></div>
            </div>
            
            <input type="file">
            
            <div class="field">
              <button class="firstNext next">Siguiente</button>
            </div>
            
          </div>

          <div class="page">
            <div class="title">Datos de usuario</div>
            <div class="field">
              
              <div class="label">Nombres:</div>
              <input type="text">
            </div>
            <div class="field">
              <div class="label">Apellidos:</div>
              <input type="text">
            </div>
            <div class="field">
              <div class="label">DNI:</div>
              <input type="text">
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
              <input type="date">
            </div>
            <div class="field">
              <div class="label">Genero</div>
              <select>
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
              <input type="text">
            </div>
            <div class="field">
              <div class="label">Número telefónico</div>
              <input type="tel" name="" id="">
            </div>
            <div class="field btns">
              <button class="prev-3 prev">Atrás</button>
              <button class="submit">Enviar</button>
            </div>
          </div>
        </form>



      </div>
    </div>
    <script src="../../js/registroNewUs.js"></script>

  </body>
</html>
