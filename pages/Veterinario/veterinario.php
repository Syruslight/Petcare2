
<!--Perfil del veterinario (deriva o esta incluido de su pagina principal)-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='veterinario.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Pagina de Veterinario</title>
</head>
<body>


<div class="wrapper">
    <div class="profile">
        <div class="first-seccion">
            <div class="logo">
                <img src="../../imagenes/perfilVeterinario/logo.png" alt="Logo" width="168" height="46">
            </div>
           
            <img src="../../imagenes/perfilVeterinario/veterinario.png" alt="profile" width="217" height="227">
        <div class="profile-information">
              
            <span class="user">Luis Alberto :V</span>
            <img class="image-profile"src="../../imagenes/perfilVeterinario/pencil.png" alt="pencil" width="32" height="30">
        </div >
        <span class="id">DNI:64545454465 </span>

        </div>
        <div class="second-seccion">
            <div class="categories">
                <div class="icons">  
                 <img src="https://img.icons8.com/ios/50/null/health-data.png" width="25" height="25"/>
                 <span class="principal">Principal</span>
                </div>
                <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/conference-call--v1.png" width="25" height="25" />
                            <span class="list">Mis mascotas</span>
                        </div>
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/chat-message-sent.png" width="25" height="25"/>
                <span class="list">Productos</span>
                </div>
                <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/database--v1.png" width="25" height="25" />
                        <span class="list">Servicios</span>
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
            <span class="tittle-header">Luis Alberto :V</span> <!--Se abre codigo php para invocar a la sesion del 'usuario'-->
            <img src="../../imagenes/perfilVeterinario/veterinario.png" alt="profile" width="38" height="39">
        </div>
       
  
<div class="wrapper-corpes">
    <div class="wrapper-quotes">
        <div class="corpes-quotes">
            <div class="search-quotes">
                <div class="edit-dni">
                    <div class="search-dni">
                        <span >Ingrese DNI: </span>
                    </div>
                    <input class="input-search" type="search" name="busqueadaDNI" placeholder="DNI">
                </div>
                <div class="edit-filter">
                <img src="../../imagenes/perfilVeterinario/filtrar.png" width=50 height=35>
                    <span class="apply-filter">Filtrar</span>
                </div>
                <button class="add-quotes">+Generar Citas</button>
            </div>
            <div> 

            </div>
        </div>


        <div>
            hkjgfghghfaghjf
        </div>
    </div>
    <div>
        <span>
            Calendario
        </span>
    </div>
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