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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../administradorProducts/administradorProducts.css">
    <link rel="stylesheet" href="../editAdministrador/editModalAdministrador.css">
    <link rel="stylesheet" href='../components/navListAdministrador.css'>
    <link rel="stylesheet" href='../components/headerAdministrador.css'>
    <link rel="stylesheet" href="../administradorAccounts/estiloAdministradorCrearCuentas.css">
    <link rel="stylesheet" href='../cerrarSesionAdmin/cerrarSession.css'>
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
              <?php
            include('../cerrarSesionAdmin/cerrarSessionAdm.php');
            ?> 
            <div class="encabezadoCuenta">
                <h1 class="tituloCuenta">Lista de cuentas de Veterinarios
                    <p>Bienvenido <?= $value[0] ?> <?= $value[1] ?>, empieza a crear tus cuentas</p>
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
                        <form class="formularioCrearCuentas"
                            action="../../../llamadas/proceso_registrarCuentaVeterinario.php" method="post"
                            enctype="multipart/form-data">

                            <div class="container mt-3">
                                <div class="contenedorCrearCuenta">
                                    <p class="textoCrearCuenta"><?= $value[0] ?>
                                        <?= $value[1] ?>, recuerda que al crear la cuenta, ya no puede eliminarla, solo
                                        desactivarla</p>
                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" id="inputCorreo" class="form-control" id="email"
                                            placeholder="Enter email" name="correoNuevo" required>
                                        <label for="email">Correo electrónico:</label>
                                    </div>
                                    <div class="form-floating mt-3 mb-3">
                                        <input id="inputContraseña" type="password" class="form-control" id="pwd"
                                            placeholder="Enter password" name="contraseniaNueva" required>
                                        <label for="pwd">Contraseña</label>
                                    </div>
                                    <button class="botonEnviarCuenta" type="submit">Enviar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </section>

            <div class="tablaCuentasAdmin">
                <?php
                $idusuario = $value[7];
                $sentencia = "SELECT u.pass
                FROM usuario u
                JOIN administrador a ON u.idusuario = a.idusuario
                WHERE a.idadministrador = $idusuario";

                $res = mysqli_query($conn, $sentencia);

                if ($res && mysqli_num_rows($res) > 0) {
                    $row = mysqli_fetch_assoc($res);
                    $password = $row['pass'];
                }

                // Llamar a la función listarCuentasVeterinarios pasando la conexión
                $cuentasVeterinarios = listarCuentasVeterinarios($conn);

                if (!empty($cuentasVeterinarios)) {
                    $numero = 1;

                    echo "<div class='contenedorTablaCrearCuenta'><table class='tablaCuentasCreadas'>
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th hidden>id</th>
                                <th>Fecha de Creación</th>
                                <th>Email</th>
                                <th>Contraseña</th>
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
                                    <td hidden>" . $cuenta['idusuario'] . "</td>
                                    <td>" . $cuenta['fechaCre'] . "</td>
                                    <td>" . $cuenta['email'] . "</td>
                                    <td id=\"password-" . $cuenta['idusuario'] . "\">" . str_repeat('*', 8) . "<img src='../../../imagenes/paswordIcono.png' width='30px' height='30px' onclick=\"contAdmin(" . $cuenta['idusuario'] . ")\">" . "</td>
                                    <td>
                                        <div class=\"toggle-switch\">
                                            <input type=\"checkbox\" id=\"" . $toggleID . "\" class=\"toggle-switch-checkbox\" onchange=\"updateStatus(" . $cuenta['idusuario'] . ", this.checked, '¿Desea cambiar el estado del veterinario?')\" " . ($cuenta['estado'] == '2' ? 'checked' : '') . " data-original-state=\"" . ($cuenta['estado'] == '2' ? 'true' : 'false') . "\" " . ($cuenta['estado'] == '3' ? 'disabled' : '') . "/>
                                            <label for=\"" . $toggleID . "\" class=\"toggle-switch-label\"></label>
                                            <div class=\"toggle-switch-text " . $estadoClass . "\">" . $estado . "</div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>";

                        $numero++;
                    }

                    echo "</table>";
                } else {
                    echo "No se encontraron veterinarios.";
                }
                ?>
            </div>

        </div>
        <?php
        include('../../Administrador/components/footerAdministrador.php');
        ?>
    </div>
</body>

<script>
   function contAdmin(idUsuario) {
    var respuesta = prompt("Ingrese su contraseña:");
    var password = '<?php echo addslashes($password); ?>';

    if (respuesta === password) {
        // Realizar una solicitud Ajax al servidor para obtener la contraseña del usuario
        $.ajax({
            url: 'obtenerContraseña.php',
            method: 'POST',
            data: {idUsuario: idUsuario},
            success: function(response) {
                var tdPassword = document.getElementById('password-' + idUsuario);
                var newPasswordHTML = response + " <img src='../../../imagenes/paswordIcono.png' width='30px' height='30px' onclick=\"encriptarContra(" + idUsuario + ")\">";
                tdPassword.innerHTML = newPasswordHTML;
            },
            error: function() {
                alert('Error al obtener la contraseña del usuario.');
            }
        });
    } else {
        alert('Error al obtener la contraseña del usuario.');
    }
}

function encriptarContra(idUsuario) {
    var tdPassword = document.getElementById('password-' + idUsuario);
    var passwordText = tdPassword.innerText;
    
    if (passwordText.includes('')) {
        // La contraseña ya está enmascarada, restaurar estructura original
        var asterisks = '*'.repeat(8);
        var newPasswordHTML = asterisks + " <img src='../../../imagenes/paswordIcono.png' width='30px' height='30px' onclick=\"contAdmin(" + idUsuario + ")\">";
        tdPassword.innerHTML = newPasswordHTML;
    } 
}
</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../../js/Interacciones.js"></script>
<script src="../../../js/cambiarEstado.js"></script>
<script src="../cerrarSesionAdmin/cerrarSession.js"></script>

</html>
