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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='../administradorIndex/administrador.css'>
    <link rel="stylesheet" href='../editAdministrador/editModalAdministrador.css'>
    <link rel="stylesheet" href='../administradorAccounts/estiloAdministradorCrearCuentas.css'>
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

            <?php
            include('../editAdministrador/editModalAdministrador.php');
            ?>
            <div class="encabezadoCuenta">
                <h1 class="tituloCuenta">Lista de cuentas de Veterinarios
                    <p>Bienvenido <?= $value[0] ?> <?= $value[1] ?> empieza a crear tus cuentas</p>
                </h1>
                <button id="open" class="addNewAccount" onclick="openModalCreacionCuentasAdministrador()">+ Nueva
                    cuenta</button>

            </div>
            <!--Formulario para registrar usuario nuevo-->

            <section class="modalAdministradorCrearCuenta">
                <div class="modalAdministradorCrearCuenta__container">
                    <div class="cuadro_modalAdministradorCrearCuenta">
                        <div class="top-formAdministradorCrearCuenta">
                            <div class="tituloAdministradorCrearCuenta">
                                <h2 class="tituloformCrearCuenta">Crear Cuenta Veterinario</h2>
                            </div>
                            <div id="closeModalAdministradorCrearCuenta">
                                &#10006
                            </div>
                        </div>
                        <form class="formularioCrearCuentas" action="../../../llamadas/proceso_registrarCuentaVeterinario.php" method="post" enctype="multipart/form-data">

                            <div class="container mt-3">
                                <h2>Crear cuentas</h2>
                                <p></p>
                                <form action="/action_page.php">
                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="correoNuevo" required>
                                        <label for="email">Correo electronico:</label>
                                    </div>
                                    <div class="form-floating mt-3 mb-3">
                                        <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="contraseniaNueva" required>
                                        <label for="pwd">Contraseña</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>

                        </form>






                    </div>
                </div>
            </section>


            <div class="tablaCuentasAdmin">
    <?php
    // Llamar a la función listarCuentasVeterinarios pasando la conexión
    $cuentasVeterinarios = listarCuentasVeterinarios($conn);

    if (!empty($cuentasVeterinarios)) {
        $numero = count($cuentasVeterinarios);

        echo "<table class='tablaCuentasCreadas'>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Fecha de Creación</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Estado</th>
                </tr>
            </thead>";

        // Mostrar los datos en la tabla
        foreach ($cuentasVeterinarios as $cuenta) {
            $estado = ($cuenta['estado'] == 2) ? "Habilitado" : "Deshabilitado";
            $estadoClass = ($cuenta['estado'] == 2) ? "Habilitado" : "Deshabilitado";

            $toggleID = 'switch' . $cuenta['idusuario']; // ID del elemento del toggle

            echo "<tbody>
                <tr> 
                    <td>" . $numero . "</td>
                    <td>" . $cuenta['fechaCre'] . "</td>
                    <td>" . $cuenta['email'] . "</td>
                    <td>" . $cuenta['pass'] . "</td>
                    <td>
                        <div class=\"toggle-switch\">
                            <input type=\"checkbox\" id=\"" . $toggleID . "\" class=\"toggle-switch-checkbox\" onchange=\"updateStatus(" . $cuenta['idusuario'] . ", this.checked, '¿Desea cambiar el estado del veterinario?')\" " . ($cuenta['estado'] == '2' ? 'checked' : '') . " data-original-state=\"" . ($cuenta['estado'] == '2' ? 'true' : 'false') . "\" " . ($cuenta['estado'] == '3' ? 'disabled' : '') . "/>
                            <label for=\"" . $toggleID . "\" class=\"toggle-switch-label\"></label>
                            <div class=\"toggle-switch-text " . $estadoClass . "\">" . $estado . "</div>
                        </div>
                    </td>
                </tr>
            </tbody>";

            $numero--;
        }

        echo "</table>";
    } else {
        echo "No se encontraron veterinarios.";
    }
    ?>
</div>


            <?php
            include('../../Administrador/components/footerAdministrador.php');
            ?>
        </div>
</body>
<script src="../../../js/Interacciones.js"></script>
<script src="../../../js/cambiarEstado.js"></script>
    
</html>