<?php
require('../../../controlador/conexion.php');
$conn = conectar();
?>

<?php
session_start();
$email = $_SESSION['email'];
foreach (listarVeterinario($email, $conn) as $key => $value) {
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='../administradorProducts/administradorProducts.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href='../../Veterinario/veterinario.css'>
    <link rel="stylesheet" href='reservarCitas.css'>
    <link rel="stylesheet" href='../components/navListAdministrador.css'>
    <link rel="stylesheet" href='../cerrarSesionAdmin/cerrarSession.css'>
    <title>Pagina De Administrador</title>
</head>

<body>
    <div class="wrapper">
        <div class="profile">
            <?php include('../components/navListAdministrador.php'); ?>
        </div>

        <div class="dash-information">
            <?php include('../components/headerAdministrador.php'); ?>

            <?php

            // Obtener los estados de las citas
            

            $sentencia1 = "SELECT c.idcita, h.fecha AS fecha, m.nombre AS nombreMascota, ps.nombre AS servicio,
            h.horarioinicio, h.horariofin, CONCAT(cli.nombres, ' ', cli.apellidos) AS cliente,
            c.estadopago, c.estadoAtencion, v.nombres, v.apellidos, c.fotoComprobante, u.email as correo
            FROM cita c
            INNER JOIN horario h ON c.idhorario = h.idhorario
            INNER JOIN mascota m ON m.idmascota = c.idmascota
            INNER JOIN productoservicio ps ON h.idproductoservicio = ps.idproductoservicio
            INNER JOIN cliente cli ON c.idcliente = cli.idcliente
            INNER JOIN usuario u ON cli.idusuario = u.idusuario
            INNER JOIN veterinario v ON h.idveterinario = v.idveterinario
            WHERE c.estadopago = 0
            ORDER BY c.idcita DESC;";

            $resultado = mysqli_query($conn, $sentencia1);

            // Consulta para citas con estado de pago igual a 0 (pendientes)
            $sentenciaRealizada = "SELECT c.idcita, h.fecha AS fecha, m.nombre AS nombreMascota, ps.nombre AS servicio,
            h.horarioinicio, h.horariofin, CONCAT(cli.nombres, ' ', cli.apellidos) AS cliente,
            c.estadopago, c.estadoAtencion, v.nombres, v.apellidos, c.fotoComprobante, u.email as correo
            FROM cita c
            INNER JOIN horario h ON c.idhorario = h.idhorario
            INNER JOIN mascota m ON m.idmascota = c.idmascota
            INNER JOIN productoservicio ps ON h.idproductoservicio = ps.idproductoservicio
            INNER JOIN cliente cli ON c.idcliente = cli.idcliente
            INNER JOIN usuario u ON cli.idusuario = u.idusuario
            INNER JOIN veterinario v ON h.idveterinario = v.idveterinario
            WHERE c.estadopago = 1
            ORDER BY c.idcita DESC;";

            $resultadoRealizado = mysqli_query($conn, $sentenciaRealizada);
            // Consulta para citas con estado de pago igual a 2 (canceladas)
            $sentenciaCanceladas = "SELECT c.idcita, h.fecha AS fecha, m.nombre AS nombreMascota, ps.nombre AS servicio,
            h.horarioinicio, h.horariofin, CONCAT(cli.nombres, ' ', cli.apellidos) AS cliente,
            c.estadopago, c.estadoAtencion, v.nombres, v.apellidos, c.fotoComprobante, u.email as correo
            FROM cita c
            INNER JOIN horario h ON c.idhorario = h.idhorario
            INNER JOIN mascota m ON m.idmascota = c.idmascota
            INNER JOIN productoservicio ps ON h.idproductoservicio = ps.idproductoservicio
            INNER JOIN cliente cli ON c.idcliente = cli.idcliente
            INNER JOIN usuario u ON cli.idusuario = u.idusuario
            INNER JOIN veterinario v ON h.idveterinario = v.idveterinario
            WHERE c.estadopago = 2
            ORDER BY c.idcita DESC;";

            $resultadoCanceladas = mysqli_query($conn, $sentenciaCanceladas);


            $citasTotales = mysqli_num_rows($resultadoRealizado) + mysqli_num_rows($resultado) + mysqli_num_rows($resultadoCanceladas);
            $citasRealizadas = mysqli_num_rows($resultadoRealizado);
            $citasPendientes = mysqli_num_rows($resultado);
            $citasCanceladas = mysqli_num_rows($resultadoCanceladas);
            ?>
            <div class="contenedorGeneralEstadisticas">
                <div id="citasTotales" class="contenedorUnitario">
                    <div id="citasTotales" class="contenedorImg">
                        <img src="../../../imagenes/citasTotales.png" alt="citasTotalesImagen">
                    </div>
                    <div class="contenedorKPICitas">
                        <p class="tituloCitas">
                            Citas Totales
                        </p>
                        <p class="numeroCitas">
                            <?php echo $citasTotales; ?>
                        </p>
                    </div>
                </div>
                <div id="citasPendientes" class="contenedorUnitario">
                    <div id="citasPendientes" class="contenedorImg">
                        <img src="../../../imagenes/citasPendientes.png" alt="citasPendientes" width="69px"
                            height="69px">
                    </div>
                    <div class="contenedorKPICitas">
                        <p class="tituloCitas">
                            Citas Pendientes
                        </p>
                        <p class="numeroCitas">
                            <?php echo $citasPendientes; ?>
                        </p>
                    </div>
                </div>
                <div id="citasRealizadas" class="contenedorUnitario">
                    <div id="citasRealizadas" class="contenedorImg">
                        <img src="../../../imagenes/citasRealizadas.png" alt="citasRealizadas">
                    </div>
                    <div class="contenedorKPICitas">
                        <p class="tituloCitas">
                            Citas Realizadas
                        </p>
                        <p class="numeroCitas">
                            <?php echo $citasRealizadas; ?>
                        </p>
                    </div>
                </div>

                <div id="citasCanceladas" class="contenedorUnitario">
                    <div id="citasCanceladas" class="contenedorImg">
                        <img src="../../../imagenes/citasCanceladas.png" alt="citasCanceladas">
                    </div>
                    <div class="contenedorKPICitas">
                        <p class="tituloCitas">
                            Citas Canceladas
                        </p>
                        <p class="numeroCitas">
                            <?php echo $citasCanceladas; ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="contenedorReservarCitas">

                <div class="contenedorSuperiorCitas">
                    <h2>Reserva de citas </h2>



                </div>

                <div class="contenedorPrincipal">
                    <div class="tab">
                        <button class="tablinks" data-target="tablaCitasProgramadas"
                            onclick="cambiarTab('tablaCitasProgramadas')">Citas Programadas</button>
                        <button class="tablinks" data-target="tablaCitasRealizadas"
                            onclick="cambiarTab('tablaCitasRealizadas')">Citas Realizadas</button>
                        <button class="tablinks" data-target="tablaCitasNoRealizadas"
                            onclick="cambiarTab('tablaCitasNoRealizadas')">Citas No Realizadas</button>
                    </div>
                    <div id="tablaCitasProgramadas" class="tablaCitas active">
                        <!-- Tabla de citas programadas -->
                        <table>
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Fecha</th>
                                    <th>Servicio</th>
                                    <th>Hora</th>
                                    <th>Cliente</th>
                                    <th>Correo</th>

                                    <th>Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($registro = mysqli_fetch_assoc($resultado)) {
                                    echo '<tr>';
                                    echo '<td>' . $registro['idcita'] . '</td>';
                                    $fechaFormateada = date('d/m/Y', strtotime($registro['fecha']));
                                    echo '<td>' . $fechaFormateada . '</td>';
                                    echo '<td>' . $registro['servicio'] . '(' . $registro['nombres'] . ' ' . $registro['apellidos'] . ')' . '</td>';
                                    $horarioInicio = date('h:i A', strtotime($registro['horarioinicio']));
                                    $horarioFin = date('h:i A', strtotime($registro['horariofin']));
                                    echo '<td>' . $horarioInicio . ' - ' . $horarioFin . '</td>';
                                    echo '<td>' . $registro['cliente'] . ' (' . $registro['nombreMascota'] . ')' . '</td>';
                                    echo '<td>' . $registro['correo'] . '</td>';

                                    echo '<td>';
                                    echo '<div class="detalleButton"><button class="detalleBtn" data-img-src="../../../imagenes/comprobanteFoto/' . $registro['fotoComprobante'] . '">Detalle</button></div>';

                                    echo '<select class="estadoPago" onchange="actualizarEstadoPago(this)">';
                                    echo '<option value="0" ' . ($registro['estadopago'] == '0' ? 'selected' : '') . '>Pendiente</option>';
                                    echo '<option value="1" ' . ($registro['estadopago'] == '1' ? 'selected' : '') . '>Realizado</option>';
                                    echo '<option value="2" ' . ($registro['estadopago'] == '2' ? 'selected' : '') . '>No Realizado</option>';
                                    echo '</select>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div id="tablaCitasRealizadas" class="tablaCitas">
                        <!-- Tabla de citas realizadas -->
                        <table>
                            <thead>
                                <tr>
                                <th>N°</th>
                                    <th>Fecha</th>
                                    <th>Servicio</th>
                                    <th>Hora</th>
                                    <th>Cliente</th>
                                    <th>Correo</th>

                                    <th>Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($registro = mysqli_fetch_assoc($resultadoRealizado)) {
                                    echo '<tr>';
                                    echo '<td>' . $registro['idcita'] . '</td>';
                                    $fechaFormateada = date('d/m/Y', strtotime($registro['fecha']));
                                    echo '<td>' . $fechaFormateada . '</td>';
                                    echo '<td>' . $registro['servicio'] . '(' . $registro['nombres'] . ' ' . $registro['apellidos'] . ')' . '</td>';
                                    $horarioInicio = date('h:i A', strtotime($registro['horarioinicio']));
                                    $horarioFin = date('h:i A', strtotime($registro['horariofin']));
                                    echo '<td>' . $horarioInicio . ' - ' . $horarioFin . '</td>';
                                    echo '<td>' . $registro['cliente'] . ' (' . $registro['nombreMascota'] . ')' . '</td>';
                                    echo '<td>' . $registro['correo'] . '</td>';

                                    echo '<td>';
                                    echo '<div class="detalleButton"><button class="detalleBtn" data-img-src="../../../imagenes/comprobanteFoto/' . $registro['fotoComprobante'] . '">Detalle</button></div>';

                                    echo '<select class="estadoPago" onchange="actualizarEstadoPago(this)">';
                                    echo '<option value="0" ' . ($registro['estadopago'] == '0' ? 'selected' : '') . '>Pendiente</option>';
                                    echo '<option value="1" ' . ($registro['estadopago'] == '1' ? 'selected' : '') . '>Realizado</option>';
                                    echo '<option value="2" ' . ($registro['estadopago'] == '2' ? 'selected' : '') . '>No Realizado</option>';
                                    echo '</select>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="tablaCitasNoRealizadas" class="tablaCitas">
                        <!-- Tabla de citas no realizadas -->
                        <table>
                            <thead>
                                <tr>
                                <th>N°</th>
                                    <th>Fecha</th>
                                    <th>Servicio</th>
                                    <th>Cliente</th>
                                    <th>Horario</th>
                                    <th>Correo</th>
                                    
                                    <th>Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($registro = mysqli_fetch_assoc($resultadoCanceladas)) {
                                    echo '<tr>';
                                    echo '<td>' . $registro['idcita'] . '</td>';
                                    $fechaFormateada = date('d/m/Y', strtotime($registro['fecha']));
                                    echo '<td>' . $fechaFormateada . '</td>';
                                    echo '<td>' . $registro['servicio'] . '(' . $registro['nombres'] . ' ' . $registro['apellidos'] . ')' . '</td>';
                                    $horarioInicio = date('h:i A', strtotime($registro['horarioinicio']));
                                    $horarioFin = date('h:i A', strtotime($registro['horariofin']));
                                    echo '<td>' . $horarioInicio . ' - ' . $horarioFin . '</td>';
                                    echo '<td>' . $registro['cliente'] . ' (' . $registro['nombreMascota'] . ')' . '</td>';
                                    echo '<td>' . $registro['correo'] . '</td>';

                                    echo '<td>';
                                    echo '<div class="detalleButton"><button class="detalleBtn" data-img-src="../../../imagenes/comprobanteFoto/' . $registro['fotoComprobante'] . '">Detalle</button></div>';

                                    echo '<select class="estadoPago" onchange="actualizarEstadoPago(this)">';
                                    echo '<option value="0" ' . ($registro['estadopago'] == '0' ? 'selected' : '') . '>Pendiente</option>';
                                    echo '<option value="1" ' . ($registro['estadopago'] == '1' ? 'selected' : '') . '>Realizado</option>';
                                    echo '<option value="2" ' . ($registro['estadopago'] == '2' ? 'selected' : '') . '>No Realizado</option>';
                                    echo '</select>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="modalDetalleComprobante" class="modal">
                <div class="modal-content">
                    <div class="container-foto">
                        <span class="close">&times;</span>
                        <img id="imagenComprobante" src="" alt="Comprobante de Pago">
                    </div>
                </div>
            </div>


            <?php include('../components/footerAdministrador.php'); ?>

            <?php
            include('../cerrarSesionAdmin/cerrarSessionAdm.php');
            ?>
     <script>
    function enviarCorreoAJAX(correo,nombre) {
        // Ejemplo de solicitud AJAX usando jQuery para enviar el correo
        $.ajax({
            url: 'enviarcorreo.php',
            method: 'POST',
            data: {
                correo: correo,
                nombre: nombre
            },
            success: function (response) {
                if (response === 'success') {
                    alert('El correo se ha enviado exitosamente a ' + correo);
                } else {
                    alert('Error al enviar el correo a ' + correo);
                }
            },
            error: function () {
                alert('Error en la solicitud AJAX para enviar el correo');
            }
        });
    }

    function actualizarEstadoPago(selectElement) {
                    var nuevoEstado = selectElement.value;
                    var idCita = selectElement.parentNode.parentNode.firstChild.innerText;
                    var correo = selectElement.parentNode.parentNode.querySelector('td:nth-child(6)').innerText; // Obtener el correo
                    var nombre = selectElement.parentNode.parentNode.querySelector('td:nth-child(5)').innerText; // Obtener el nombre

                    if (confirm("¿Está seguro de cambiar el estado de pago de la cita?")) {
                        // Aquí puedes enviar una solicitud AJAX para actualizar el estado en la base de datos
                        // y luego recargar la página para mostrar el nuevo estado actualizado

                        // Ejemplo de solicitud AJAX usando jQuery
                        $.ajax({
                            url: 'actualizar_estado_pago.php',
                            method: 'POST',
                            data: {
                                idCita: idCita,
                                nuevoEstado: nuevoEstado
                            },
                            success: function (response) {
                                if (response === 'success') {
                                    location.reload(); // Recargar la página después de la actualización exitosa
                                    if (nuevoEstado === '1') {
                                        enviarCorreoAJAX(correo, nombre);
                                    } else if (nuevoEstado === '2') {
                                        alert('No se envió el correo a ' + correo);
                                    } else {
                                        alert('Se actualizó correctamente el estado de pago.');
                                    }
                                } else {
                                    alert('Error al actualizar el estado de pago');
                                }
                            },
                            error: function () {
                                alert('Error en la solicitud AJAX');
                            }
                        });
                    } else {
                        // Si el usuario cancela el cambio, debes revertir la selección en el elemento select
                        var estadoActual = selectElement.getAttribute('data-estado-actual');
                        selectElement.value = estadoActual;
                    }
                }

            </script>
            <script>
                // Obtener los elementos de las pestañas y las tablas
                var tabs = document.getElementsByClassName("tablinks");
                var tabContent = document.getElementsByClassName("tablaCitas");

                // Agregar eventos de clic a las pestañas
                for (var i = 0; i < tabs.length; i++) {
                    tabs[i].addEventListener("click", function () {
                        // Obtener el ID del elemento objetivo
                        var targetId = this.getAttribute("data-target");

                        // Ocultar todas las tablas
                        for (var j = 0; j < tabContent.length; j++) {
                            tabContent[j].classList.remove("active");
                        }

                        // Mostrar la tabla correspondiente al elemento objetivo
                        document.getElementById(targetId).classList.add("active");

                        // Remover la clase "active" de todas las pestañas
                        for (var k = 0; k < tabs.length; k++) {
                            tabs[k].classList.remove("active");
                        }

                        // Agregar la clase "active" a la pestaña seleccionada
                        this.classList.add("active");
                    });
                }
            </script>

            <script>
                var modal = document.getElementById('modalDetalleComprobante');
                var imagenComprobante = document.getElementById('imagenComprobante');
                var detalleButtons = document.getElementsByClassName('detalleBtn');
                for (var i = 0; i < detalleButtons.length; i++) {
                    detalleButtons[i].addEventListener('click', function () {
                        var imgSrc = this.getAttribute('data-img-src');
                        imagenComprobante.src = imgSrc;
                        modal.style.display = 'block';
                    });
                }
                var closeBtn = document.getElementsByClassName('close')[0];
                closeBtn.addEventListener('click', function () {
                    modal.style.display = 'none';
                });
                window.addEventListener('click', function (event) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                });
            </script>

            <script src="../../../js/previsualizarImagen.js"></script>
            <script src="../../../js/Interacciones.js"></script>
            <script src="../cerrarSesionAdmin/cerrarSession.js"></script>

        </div>
</body>

</html>