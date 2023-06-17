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
    <link rel="stylesheet" href='../Veterinario/editarVeterinario/estiloModalVeterinario.css'>
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
    <?php
            include('components/headerVeterinario.php');
        ?> 

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
    </div>
    
</div>

</div>

 
</div>
</div>

    </section>
<?php
            include('../Veterinario/editarVeterinario/modalEditarVeterinario.php');
        ?> 
       

<?php
            include('components/footerVeterinario.php');
        ?> 
       



    <script src="../../js/previsualizarImagen.js"></script>
    <script src="../../js/Interacciones.js"></script>

</body>
</html>