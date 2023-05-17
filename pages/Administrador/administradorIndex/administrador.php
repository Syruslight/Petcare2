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
    <link rel="stylesheet" href='administrador.css'>
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
                 <span class="principal">Principal</span>
                </div>
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/chat-message-sent.png" width="25" height="25"/>
                <span class="list">Productos</span>
                </div>
                <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/database--v1.png" width="25" height="25" />
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
            <span class="tittle-header"><?=$value[0]?>  <?=$value[1]?></span> <!--Se abre codigo php para invocar a la sesion del 'usuario'-->
            <img src="../../../imagenes/fotosperfil/administrador/<?=$value[6]?>" alt="profile" width="38" height="39">
        </div>
        <?php
                    }
                    ?>
        <div class="wrapper-drawer">
            <h1>Mis servicios</h1>


            <!-- Swiper -->
            <div class="swiper">
                <div class="swiper-wrapper">
                <div class="swiper-slide">  <!--Primer Slide-->
                    <div class="cardpet">
                        <img src="../../../imagenes/perfilAdmin/dog1.png" alt="" width="172" height="190">
                        <div class="semicrud-pet">
                            <button class="button-edit">
                               Editar
                            </button>
                            <img class="option-delete"src="../../../imagenes/perfilAdmin/eliminar.png" alt="">
                        </div>
                    </div>
                    
                </div>
                <div class="swiper-slide"><!--Segundo Slide-->
                <div class="cardpet">
                        <img src="../../../imagenes/perfilAdmin/dog2.png" alt="" width="172" height="190">
                        <div class="semicrud-pet">
                            <button class="button-edit">
                               Editar
                            </button>
                            <img class="option-delete"src="../../../imagenes/perfilAdmin/eliminar.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide"> <!--Tercer Slide-->
                
                <div class="cardpet">
                        <img src="../../../imagenes/perfilAdmin/dog3.png" alt="" width="172" height="190">
                        <div class="semicrud-pet">
                            <button class="button-edit">
                               Editar
                            </button>
                            <img class="option-delete"src="../../../imagenes/perfilAdmin/eliminar.png" alt="">
                        </div>
                    </div>

                </div>

                <div class="swiper-slide"> <!--Cuarto Slide-->
                    
                <div class="cardpet">
                        <img src="../../../imagenes/perfilAdmin/dog4.png" alt="" width="172" height="190">
                        <div class="semicrud-pet">
                            <button class="button-edit">
                               Editar
                            </button>
                            <img class="option-delete"src="../../../imagenes/perfilAdmin/eliminar.png" alt="">
                        </div>
                    </div>
                    
                </div>
                
                <div class="swiper-slide"> <!--Quinto Slide-->
                    
                <div class="cardpet">
                        <img src="../../../imagenes/perfilAdmin/dog5.png" alt="" width="172" height="190">
                        <div class="semicrud-pet">
                            <button class="button-edit">
                               Editar
                            </button>
                            <img class="option-delete"src="../../../imagenes/perfilAdmin/eliminar.png" alt="">
                        </div>
                    </div>
                    
                </div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div> <!-- Finish Swiper -->

        </div>

        <div class="wrapper-myclients">
            <div class="subwrapper-myclients">
                <div class="clients-search">
                    <h1>Mis Clientes</h1>
                    <button class="button-search">
                        Buscar
                    </button>
                </div>
                <div class="wrapper-search">
                <span>Buscar: <input type="search" name="searchuser" placeholder="Dni, nombre, telefono..."></span>           
                </div>
                <div class="wrapper-dates">
                    <div class="dates-name">
                        <span class="text-dates">Nombre</span>

                        <div class="client-information">
                        <img width="50" height="50" src="https://img.icons8.com/bubbles/50/user-male.png" alt="user-male"/>
                        <div class="name-lastname">
                            <span class="first-name">Manuel Renato</span>
                            <span class="last-name">Quintero Quispe</span>
                        </div>

                        </div>
                        <div class="client-information">
                        <img width="50" height="50" src="https://img.icons8.com/bubbles/50/businesswoman.png" alt="businesswoman"/>
                        <div class="name-lastname">
                            <span class="first-name">Jessie Sophia</span>
                            <span class="last-name">Sanchez soto</span>
                        </div>

                        </div>
                        <div class="client-information">
                        <img width="50" height="50" src="https://img.icons8.com/bubbles/50/user-male.png" alt="user-male"/>
                        <div class="name-lastname">
                            <span class="first-name">Manuel Renato</span>
                            <span class="last-name">Quintero Quispe</span>
                        </div>

                        </div>
                        <div class="client-information">
                        <img width="50" height="50" src="https://img.icons8.com/bubbles/50/businesswoman.png" alt="businesswoman"/>
                        <div class="name-lastname">
                            <span class="first-name">Jessie Sophia</span>
                            <span class="last-name">Sanchez soto</span>
                        </div>
                        </div>

                        <div class="client-information">
                        <img width="50" height="50" src="https://img.icons8.com/bubbles/50/user-male.png" alt="user-male"/>
                        <div class="name-lastname">
                            <span class="first-name">Manuel Renato</span>
                            <span class="last-name">Quintero Quispe</span>
                        </div>
                        </div>

                    </div>
                    <div class="dates-email">
                        <span class="text-dates">E-mail</span>

                        <div class="e-mail">
                            <span>manuel@gmail.com</span>
                        </div>
                        <div class="e-mail">
                            <span>Jessie@gmail.com</span>
                        </div>
                        <div class="e-mail">
                            <span>manuel@gmail.com</span>
                        </div>
                        <div class="e-mail">
                            <span>Jessie@gmail.com</span>
                        </div>
                        <div class="e-mail">
                            <span>manuel@gmail.com</span>
                        </div>
                   
                    </div>
                    <div class="dates-cellphone">
                        <span class="text-dates">Telefono</span>

                        <div class="cell-phone">
                            <span>981424545</span>
                        </div>
                        <div class="cell-phone">
                            <span>981424545</span>
                        </div>
                        <div class="cell-phone">
                            <span>981424545</span>
                        </div>
                        <div class="cell-phone">
                            <span>981424545</span>
                        </div>
                        <div class="cell-phone">
                            <span>981424545</span>
                        </div>

                    </div>
                    <div class="dates-info">
                        <span class="text-dates"> Informacion </span>
                       <div class="button-see">
                           <button>Ver Cliente</button>
                       </div>
                       <div class="button-see">
                           <button>Ver Cliente</button>
                       </div>
                       <div class="button-see">
                           <button>Ver Cliente</button>
                       </div>
                       <div class="button-see">
                           <button>Ver Cliente</button>
                       </div>
                       <div class="button-see">
                           <button>Ver Cliente</button>
                       </div>
                    </div>
                </div>

            </div> 







            <div class="subwrapper-product">
               <h1 class="tittle-products">Productos populares</h1> 
               <div class="product-price"> 
                <div class="subtittle-proprice"> 
                    <span class="subtitle-product">
                        Productos
                    </span>   
                    <span class="subtitle-price">
                        Precio
                    </span>  
                </div>
                <div class="wrapper-productandprice"><!-- Producto 1 -->
                    <div class="wrapper-product">
                        <img src="../../../imagenes/perfilAdmin/producto1.png" width="64.42"height="70">
                        <div class="subcontainer-product">
                            <span class="type-category">
                                Product A
                            </span>
                            <span class="type-product">
                                Pelotas
                            </span>
                        </div>
                    </div>
                        <span class="price">s/.50.00</span>
                   
                </div>
                <hr class="line">
                <div class="wrapper-productandprice"><!-- Producto 1 -->
                    <div class="wrapper-product">
                        <img src="../../../imagenes/perfilAdmin/producto1.png" width="64.42"height="70">
                        <div class="subcontainer-product">
                            <span class="type-category">
                                Product A
                            </span>
                            <span class="type-product">
                                Pelotas
                            </span>
                        </div>
                    </div>
                        <span class="price">s/.50.00</span>
                   
                </div>
                <hr class="line">
                <div class="wrapper-productandprice"><!-- Producto 1 -->
                    <div class="wrapper-product">
                        <img src="../../../imagenes/perfilAdmin/producto1.png" width="64.42"height="70">
                        <div class="subcontainer-product">
                            <span class="type-category">
                                Product A
                            </span>
                            <span class="type-product">
                                Pelotas
                            </span>
                        </div>
                    </div>
                        <span class="price">s/.50.00</span>
                   
                </div>
                <hr class="line">
                <div class="wrapper-productandprice"><!-- Producto 1 -->
                    <div class="wrapper-product">
                        <img src="../../../imagenes/perfilAdmin/producto1.png" width="64.42"height="70">
                        <div class="subcontainer-product">
                            <span class="type-category">
                                Product A
                            </span>
                            <span class="type-product">
                                Pelotas
                            </span>
                        </div>
                    </div>
                        <span class="price">s/.50.00</span>
                   
                </div>
                <hr class="line">
                                 
                
                
               </div>
               <button class="button-product">Todos los Productos</button>
            </div> 
        </div>
         


        <div class="footer">
            <span class="copyrigth">©</span>
            <span> Vet&Care, todos los derechos reservados.</span>
        </div>


</div>


        <!-- <div>

            <button type="button" onclick="window.location.href='../mascota/registro.php'">Registrar Mascota</button>
        </div> -->
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