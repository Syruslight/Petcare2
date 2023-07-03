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
<div class="contenedorGeneralEstadisticas">
    <div id="citasTotales" class="contenedorUnitario">
        <div id="citasTotales" class="contenedorImg">
            <img src="../../imagenes/citasTotales.png" alt="citasTotalesImagen">
        </div>
        <div class="contenedorKPICitas">
            <p class="tituloCitas">
                Citas Totales
            </p>
            <p class="numeroCitas">
                58
            </p>
        </div>
    </div>
    <div id="citasRealizadas" class="contenedorUnitario">
        <div id="citasRealizadas" class="contenedorImg">
            <img src="../../imagenes/citasRealizadas.png" alt="citasRealizadas">
        </div>
        <div class="contenedorKPICitas">
            <p class="tituloCitas">
                Citas Realizadas
            </p>
            <p class="numeroCitas">
                20
            </p>
        </div>
    </div>
    <div id="citasPendientes" class="contenedorUnitario">
        <div id="citasPendientes" class="contenedorImg">
            <img src="../../imagenes/citasPendientes.png" alt="citasPendientes" width="69px" height="69px">
        </div>
        <div class="contenedorKPICitas">
            <p class="tituloCitas">
                Citas Pendientes
            </p>
            <p class="numeroCitas">
                17
            </p>
        </div>
    </div>
    <div id="citasCanceladas" class="contenedorUnitario">
        <div id="citasCanceladas" class="contenedorImg">
            <img src="../../imagenes/citasCanceladas.png" alt="citasCanceladas">
        </div>
        <div class="contenedorKPICitas">
            <p class="tituloCitas">
                Citas Canceladas
            </p>
            <p class="numeroCitas">
                08
            </p>
        </div>
    </div>
</div>
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