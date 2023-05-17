<?php
require('../../../controlador/conexion.php');
$conn = conectar();
?>
<!--Perfil del administrador (deriva o esta incluido de su pagina principal)-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='administradorService.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Pagina de administrador</title>
</head>
<body>


<div class="wrapper">
    <div class="profile">
        <div class="first-seccion">
            <div class="logo">
                <img src="../../../imagenes/perfilAdmin/logo.png" alt="Logo" width="168" height="46">
            </div>
             <!--Codigo php para obtener la variable usuario-->
             <?php
                    session_start();
                    $email = $_SESSION['email'];
                    foreach (listarAdministrador($email, $conn) as $key => $value) {
                        ?>   
            <img src="../../../imagenes/fotosperfil/administrador/<?=$value[6]?>" alt="profile" width="217" height="227">
        <div class="profile-information">
              
            <span class="user"><?=$value[0]?>  <?=$value[1]?></span>
            <img class="image-profile"src="../../../imagenes/perfilAdmin/pencil.png" alt="pencil" width="32" height="30">
        </div >
        <span class="id">DNI: <?=$value[2]?></span>

        </div>
        <div class="second-seccion">
            <div class="categories">
                <div class="icons">  
                 <img src="https://img.icons8.com/ios/50/null/health-data.png" width="25" height="25"/>
                 <span class="list">Principal</span>
                </div>
                
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/chat-message-sent.png" width="25" height="25"/>
                <span class="list">Productos</span>
                </div>
                <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/database--v1.png" width="25" height="25" />
                        <span class="services">Servicios</span>
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
            <span class="tittle-header"><?=$value[0]?>  <?=$value[1]?></span> <!--Se abre codigo php para invocar a la sesion del 'usuario'-->
            <img src="../../../imagenes/fotosperfil/administrador/<?=$value[6]?>" alt="profile" width="38" height="39">
        </div>
        <?php
                    }
                    ?>
  
<div>
   <h1>Mis Servicios</h1> 
</div>


        <!-- <div class="footer">
            <span class="copyrigth">©</span>
            <span> Vet&Care, todos los derechos reservados.</span>
        </div> -->


</div>


     
</div>
</div>
<section class="modal">
        <div class="modal__wrapper">
            <div class="modal__first">
                <div class="modal__logoclose">
                    <img class="modal__close" src="../../../imagenes/perfilCliente/close.png" alt="pencil" width="32"
                        height="30">
                </div>
                <div class="modal__profile">
                    <img src="../../../imagenes/perfilCliente/profile.png" class="modal__img" width="95" height="89">
                    <img class="" src="../../../imagenes/perfilCliente/pencil.png" width="32" height="30">
                </div>
                <span class="modal__user">
                    <?= $_SESSION['usuario'] ?>
                </span>
            </div>
            <div class="modal__data">
                <div class="moda__info">
                    <span>Nombre</span>
                    <input type="text" name="nombre" value="John Doe">
                </div>
                <div class="moda__info">
                    <span>Telefono</span>
                    <input type="text" name="nombre" value="John Doe">
                </div>
                <div class="moda__info">
                    <span>Direccion</span>
                    <input type="text" name="nombre" value="John Doe">
                </div>
            </div>
            <button class="modal__button">Actualizar Datos</button>
        </div>
    </section>
    </section>


    
<script src="../../../js/modalCliente.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="../../../js/swiperAdmin.js"></script>

</body>
</html>