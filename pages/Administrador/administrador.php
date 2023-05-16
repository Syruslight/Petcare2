<?php
require('../../controlador/conexion.php');
$conn = conectar();
?>
<!--Perfil del administrador (deriva o esta incluido de su pagina principal)-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='administrador.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Pagina de administrador</title>
</head>
<body>


<div class="wrapper">
    <div class="profile">
        <div class="first-seccion">
            <div class="logo">
                <img src="../../imagenes/perfilAdmin/logo.png" alt="Logo" width="168" height="46">
            </div>
            <img src="../../imagenes/perfilAdmin/profileAdmin.png" alt="profile" width="217" height="227">
        <div class="profile-information">
               <!--Codigo php para obtener la variable usuario-->
               <?php
                    session_start();
                    $email = $_SESSION['email'];
                    foreach (listarAdministrador($email, $conn) as $key => $value) {
                        ?>   
            <span class="user"><?=$value[0]?>  <?=$value[1]?></span>
            <img src="../../imagenes/perfilAdmin/pencil.png" alt="pencil" width="32" height="30">
        </div >
        <span class="id">DNI: <?=$value[2]?></span>
        <?php
                    }
                    ?>
        </div>
        <div class="second-seccion">
            <div class="categories">
                <div class="icons">  
                 <img src="https://img.icons8.com/ios/50/null/health-data.png" width="25" height="25"/>
                 <span class="principal">Principal</span>
                </div>
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/conference-call--v1.png" width="25" height="25"/>
                <span class="list">Mis mascotas</span>
                </div>
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/chat-message-sent.png" width="25" height="25"/>
                <span class="list">Productos</span>
                </div>
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/database--v1.png" width="25" height="25"/>
                <span class="list">servicios</span>
                </div>
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/appointment-reminders--v1.png"width="25" height="25"/>
                <span class="list">PetiPuntos </span>
                </div>
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/settings--v1.png"width="25" height="25"/>
                <span class="list">Reserva una cita</span>
                </div>
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/help--v1.png"width="25" height="25"/>
                <span class="list">Ayuda</span>
                </div>         
             
              
                <div class="sign-off">
                
                    <img src="https://img.icons8.com/ios/50/null/shutdown--v1.png" width="25" height="25"/>
                    <span class="list">Cerrar sesion</span>   
       
                </div>
            </div>
        </div>
    </div>
<div class="dash-information">
        <div class="dash-header">
            <span class="tittle-header"><?=$_SESSION['usuario']?></span> <!--Se abre codigo php para invocar a la sesion del 'usuario'-->
            <img src="../../imagenes/perfilAdmin/profileAdmin.png" alt="profile" width="38" height="39">
        </div>
        <div class="wrapper-drawer">
            <h1>Mis servicios</h1>


            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                 <img src="../../imagenes/perfilAdmin/dog1.png" alt="" width="172" height="190">
                 <button>
                    Editar
                 </button>
                 <img src="../../imagenes/perfilAdmin/eliminar.png" alt="">
                    
                </div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

    </div>
    <!-- Swiper JS -->
         




        </div>

<!-- <div class="footer">
    <span class="copyrigth">©</span>
    <span> Vet&Care, todos los derechos reservados.</span>
</div> -->

        <!-- <div>

            <button type="button" onclick="window.location.href='../mascota/registro.php'">Registrar Mascota</button>
        </div> -->
</div>
</div>

<!-- <h1> Cuenta de administrador : <?=$_SESSION['usuario']?></h1> Se abre codigo php para invocar a la sesion del 'usuario' -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
</body>
</html>