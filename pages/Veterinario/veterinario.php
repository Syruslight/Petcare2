<?php
require('../../controlador/conexion.php');
$conn = conectar();
?>

<?php
                session_start();
                $email = $_SESSION['email'];
                foreach (listarVeterinario($email, $conn) as $key => $value) {
                }?>
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
    <?php
            include('components/navListVeterinario.php');
        ?> 
    </div>

    
    <div class="dash-information">
        <div class="dash-header">
            <span class="tittle-header">Luis Alberto :V</span> <!--Se abre codigo php para invocar a la sesion del 'usuario'-->
            <img src="../../../imagenes/fotoperfil/veterinario/<?= $value[6] ?>" alt="profile" width="38" height="39">
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

        <div class="footer">
            <span class="copyrigth">©</span>
            <span> Vet&Care, todos los derechos reservados.</span>
        </div>


</div>

 
</div>
</div>
<section class="modal">
        <div class="modal__container">
            <div class="cuadro_modal">
                <div class="top-form">
                    <div class="titulo-h2">
                        <h2 class="tituloform">Editar Datos</h2>
                    </div>
                <div id="close-modal">
                        &#10006
                    </div> 
                </div>
                    <form action="../../llamadas/proceso_actualizarDatosVeterinario.php" enctype="multipart/form-data" method="POST">
                        
                        <div class="editheader">
                            <aside class="contfoto">
                                <img class="fotous" src="../../imagenes/fotosperfil/veterinario/<?= $value[6] ?>" class="modal__img" width="95" height="89">
                                <input id="foto" type="file" name="foto">
                                
                            </aside>
                            <section class="textonomap">
                                <div class="input-group">
                                    <input class="estilo-separado" type="text" name="nombres" value="<?= $value[0] ?>" required>
                                    <label for=""> Nombres</label>
                                    
                                </div>
                                <div class="input-group">
                                    <input class="estilo-separado" type="text" name="apellidos"  value="<?= $value[1] ?>" required>
                                    <label for=""> Apellidos</label>
                                </div>

                            </section>                                       
                                 </div>
                        <div class="modalinf">
                            <div class="input-group1">
                                <input class="estilo-separado1" type="TEXT" name="telefono"  value="<?= $value[4] ?>" required>
                                <label for=""> Telefono</label>
                            </div>
                            <div class="input-group2">
                                <input class="estilo-separado1" type="TEXT" name="dni"  value="<?= $value[3] ?> "required>
                                <label for=""> DNI</label>
                            </div>
                            
                            <input hidden name="idveterinario"  value="<?= $value[7] ?> "required>
                            
                        </div> 
                        <div class="modalFoot">
                                <div class="input-group3">
                                <input class="estilo-separado" type="text" name="direccion"  value="<?= $value[5] ?>" required>
                                <label for=""> Dirección</label>
                            </div>
                            </div>
                            <div class="contbtn">
                                <button class="btn-mod">ACTUALIZAR DATOS</button>
                            </div>
                            
                    </form>
    
            </div>
        </div>
    </section>
    </section>


    
    <script src="../../js/Modal.js"></script>

</body>
</html>