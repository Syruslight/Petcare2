<?php
require('../../../controlador/conexion.php');
$conn = conectar();
?>
<?php
session_start();
$email = $_SESSION['email'];
foreach (listarAdministrador($email, $conn) as $key => $value) {
?>
<?php
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='../administradorIndex/administrador.css'>
    <title>Document</title>
</head>

<body>
<div class="wrapper">
        <div class="profile">
            <?php
            include('../components/navListAdministrador.php');
            ?>
        </div>
        <div class="dash-information">
            <?php
            include('../components/headerAdministrador.php');
            ?>
    <!--Formulario para registrar usuario nuevo-->
    <form action="../../../llamadas/proceso_registrarCuentaVeterinario.php" method="post" enctype="multipart/form-data">

        <div class="container mt-3">
            <h2>Floating Labels - Inputs</h2>
            <p>Click inside the input field to see the floating label effect:</p>
            <form action="/action_page.php">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="correoNuevo"
                        required>
                    <label for="email">Correo electronico:</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="text" class="form-control" id="pwd" placeholder="Enter password"
                        name="contraseniaNueva" required>
                    <label for="pwd">Contraseña</label>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>

    </form>

    <?php
            include('../../Administrador/components/footerAdministrador.php');
            ?>
        </div>
</body>

</html>