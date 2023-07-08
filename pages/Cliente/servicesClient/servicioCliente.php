<?php
require('../../../controlador/conexion.php');
$conn = conectar();
?>
<?php
session_start();
$email = $_SESSION['email'];
foreach (listarCliente($email, $conn) as $key => $value) {
?>
<?php
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='servicioCliente.css'>
    <link rel="stylesheet" href='../editAdministrador/editModalAdministrador.css'>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Pagina de administrador</title>


</head>

<body>


<div class="wrapper">
    <div class="profile">
    <?php
        include('../components/navListCliente.php');
    ?>
    </div>
    <div  class="dash-information">
    <?php
            include('../components/headerCliente.php');
            ?>
        <div class="title-service">
            <h1 >Catalogo  de servicio </h1>
        </div>
     
        <div class="wrapper-service">
            <div class="header-table">
                <div class="search-service">

                </div>
            </div>
            <div></div>
        </div>
    </div>
</div>
  
</body>

</html>