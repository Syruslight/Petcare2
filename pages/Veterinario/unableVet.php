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
    <div class="first-seccion">
    <div class="logo">
        <img src="../../../imagenes/perfilVeterinario/logo.png" alt="Logo" width="168" height="46">
    </div>
    <?php

    $email = $_SESSION['email'];
    foreach (listarVeterinario($email, $conn) as $key => $value) {
    ?>

        <img class="photo-profile" src="../../../imagenes/fotosperfil/veterinario/<?= $value[6] ?>" alt="profile" width="217" height="227">
        <div class="profile-information">

            <span class="user"><?= $value[0] ?>
                <?= $value[1] ?></span>
         
        </div>
        <span class="id"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?= $value[2] ?> </span>
    <?php
    }
    ?>
</div>
<div class="second-seccion" style="height:700px">
    <div class="categories">
        <div class="icons">
            <img src="https://img.icons8.com/ios/50/null/health-data.png" width="25" height="25" />
            <span class="principal">Principal</span>

        </div>
        <div class="icons">
            <img src="https://img.icons8.com/ios/50/null/conference-call--v1.png" width="25" height="25" />
            <span class="list">Vacunas</span>
        </div>
        <div class="icons">
            <img src="https://img.icons8.com/ios/50/null/chat-message-sent.png" width="25" height="25" />
            <span class="list">Lotes</span>
        </div>
        <div class="icons">
            <img src="https://img.icons8.com/ios/50/null/database--v1.png" width="25" height="25" />
            <span class="list">Servicios</span>
        </div>
        <div class="icons">
            <img src="https://img.icons8.com/ios/50/null/appointment-reminders--v1.png" width="25" height="25" />
            <span class="list">PetiPuntos </span>
        </div>
        <div class="icons">
            <img src="https://img.icons8.com/ios/50/null/settings--v1.png" width="25" height="25" />
            <span class="list">Reserva una cita</span>
        </div>
        <div class="icons">
            <img src="https://img.icons8.com/ios/50/null/help--v1.png" width="25" height="25" />
            <span class="list">Ayuda</span>
        </div>

        <div class="sign-off" style="margin-top: 175px;">

            <img src="https://img.icons8.com/ios/50/null/shutdown--v1.png" width="25" height="25" />
            <form action="../../../llamadas/proceso_cerrar_sesion.php" method="POST">
                <button type="submit" class="list" name="">Cerrar sesión</button>
            </form>

        </div>
    </div>
</div>
    </div>
    
    <div class="dash-information">
    <?php
            include('components/headerVeterinario.php');
        ?> 



    <div class="container-u">
        <div class="img-container">
        <img src="../../imagenes/perfilVeterinario/perrozzz.svg" alt="perro-durmiendo">
        </div>
        <div class="card-data">
            <div class="card-text">
                <div class="text-container">
                <p>Lo sentimos, tu cuenta ha <br>sido <span>deshabilitada</span>.</p>
                <p>Por favor ponte en contacto con el <br>administrador</p>
                </div>

            </div>
            <div class="card-logo">
            <img src="../../../imagenes/perfilVeterinario/logo.png" alt="Logo" width="320" height="75">
            </div>
        </div>
    </div>






    

<?php
            include('components/footerVeterinario.php');
        ?>    



    <script src="../../js/previsualizarImagen.js"></script>
    <script src="../../js/Interacciones.js"></script>

</body>
</html>