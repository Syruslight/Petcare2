<?php
require('../../controlador/conexion.php');
$conn = conectar();
?>
<!--Perfil del veterinario (deriva o esta incluido de su pagina principal)-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='veterinario.css'>
    <title>Pagina de Veterinario</title>
</head>
<body>
<div class="wrapper">
    <div class="profile">
        <div class="first-seccion">
            <div class="logo">
                <img src="../../imagenes/perfilVeterinario/logo.png" alt="Logo" width="168" height="46">
            </div>
            <?php
                session_start();
                $email = $_SESSION['email'];
                foreach (listarVeterinario($email, $conn) as $key => $value) {
                    ?>

            <img src="../../imagenes/fotosperfil/veterinario/<?= $value[6] ?>" alt="profile" width="217" height="227">
        <div class="profile-information">
              
            <span class="user"><?= $value[0] ?>
                            <?= $value[1] ?></span>
            <img class="image-profile"src="../../imagenes/perfilVeterinario/pencil.png" alt="pencil" width="32" height="30">
        </div >
        <span class="id"> <?= $value[2] ?> </span>
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
                            <img src="https://img.icons8.com/ios/50/null/conference-call--v1.png" width="25" height="25" />
                            <a href="../../pages/Veterinario/vacunas/moduloVacunaLote.php"><span class="list">Vacunas</span></a>
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
            <div class="table-quotes"> 
                <div class="header-table">
                    <div class="quotes-header">
                    Mis citas
                    </div>
                    <div >

                        <button class="button-seeall">Ver todo</button>
                    </div>
                </div>
                <div class="corpes-table">
                    <div class="tittle-table">
                            <span class="title-client">Cliente</span>
                            <span class="title-service">Servicio</span>
                            <span class="title-schedule">Horario</span>
                        
                            <span class="title-state">Estado</span>     
                    </div>
                    <div class="content-table">
                        <div class="dates-table">
                            <div class="table-name">
                                <span>Juan Pablo </span>
                                <span>Trelles Rueda</span>
                            </div>
                            <span class="table-service">Desmotado</span>
                            <div class="table-schedule">

                                <span>13/04/2022</span>
                                <span>8:00 am - 9:00 am</span>
                            </div>
                            <span class="table-state"> Cancelado </span>
                            <button class="button-table">Ver mas</button>
                        </div>
                        <hr class="linea">

                        <div class="dates-table">
                            <div class="table-name">
                                <span>Juan Pablo </span>
                                <span>Trelles Rueda</span>
                            </div>
                            <span class="table-service">Desmontado</span>
                            <div class="table-schedule">

                                <span>13/04/2022</span>
                                <span>8:00 am - 9:00 am</span>
                            </div>
                            <span class="table-state"> Cancelado </span>
                            <button class="button-table">Ver mas</button>
                        </div>
                        <hr class="linea">
                        <div class="dates-table">
                            <div class="table-name">
                                <span>Juan Pablo </span>
                                <span>Trelles Rueda</span>
                            </div>
                            <span class="table-service">Desmontado</span>
                            <div class="table-schedule">

                                <span>13/04/2022</span>
                                <span>8:00 am - 9:00 am</span>
                            </div>
                            <span class="table-state"> Cancelado </span>
                            <button class="button-table">Ver mas</button>
                        </div>
                        <hr class="linea">
                        <div class="dates-table">
                            <div class="table-name">
                                <span>Juan Pablo </span>
                                <span>Trelles Rueda</span>
                            </div>
                            <span class="table-service">Desmontado</span>
                            <div class="table-schedule">

                                <span>13/04/2022</span>
                                <span>8:00 am - 9:00 am</span>
                            </div>
                            <span class="table-state"> Cancelado </span>
                            <button class="button-table">Ver mas</button>
                        </div>
                        <hr class="linea">
                        <div class="dates-table">
                            <div class="table-name">
                                <span>Juan Pablo </span>
                                <span>Trelles Rueda</span>
                            </div>
                            <span class="table-service">Desmontado</span>
                            <div class="table-schedule">

                                <span>13/04/2022</span>
                                <span>8:00 am - 9:00 am</span>
                            </div>
                            <span class="table-state"> Cancelado </span>
                            <button class="button-table">Ver mas</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="wrapper-bookings">
            <div class="booked-appointments"> <!-- Citas Confirmadas-->
            
                <div class="quotes-confirmed">
                    <span class="only-quotes">CITAS</span>
                    <img src="../../imagenes/perfilVeterinario/Calendar.png"width="70"height="56">
                    <span class="only-state">CONFIRMADAS</span>

                </div>
                <div class="number-booked">
                    42
                </div>
                
            </div>
            <div class="booked-appointments"> <!-- Citas en proceso-->
            
                <div class="quotes-process">
                    <span class="only-quotes">CITAS</span>
                    <img src="../../imagenes/perfilVeterinario/Calendar.png"width="70"height="56">
                    <span class="only-state">EN PROCESO</span>

                </div>
                <div class="number-booked">
                    42
                </div>
                
            </div>
            <div class="booked-appointments"> <!-- Citas Canceladas-->
            
                <div class="quotes-canceled">
                    <span class="only-quotes">CITAS</span>
                    <img src="../../imagenes/perfilVeterinario/Calendar.png"width="70"height="56">
                    <span class="only-state">CANCELADAS</span>

                </div>
                <div class="number-booked">
                    42
                </div>
                
            </div>
        </div>
    </div>
    <div class="wrapper-calendar">
        
    <img src="../../imagenes/perfilVeterinario/headerCalendar.png"width="1093px"height="56px">
    <img src="../../imagenes/perfilVeterinario/bodyCalendar.png"width="1069px"height="395px">
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