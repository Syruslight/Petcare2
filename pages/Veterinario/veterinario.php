<?php
require('../../controlador/conexion.php');
$conn = conectar();
?>

<?php
session_start();
$email = $_SESSION['email'];
foreach (listarVeterinario($email, $conn) as $key => $value) {
} ?>
<!--Perfil del veterinario (deriva o esta incluido de su pagina principal)-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href='veterinario.css'>
    <link rel="stylesheet" href='components/navListVeterinario.css'>
    <link rel="stylesheet" href='../Veterinario/editarVeterinario/estiloModalVeterinario.css'>
    <link rel="stylesheet" href='cerrarSesionVet/closeSessionVet.css'>
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
            <?php
            // Obtener los estados de las citas
            

            $sentencia1 = "SELECT c.idcita, h.fecha AS fecha, m.nombre AS nombreMascota, ps.nombre AS servicio, 
                h.horarioinicio, h.horariofin, CONCAT(cli.nombres, ' ', cli.apellidos) 
                AS cliente, c.estadoAtencion, c.estadopago
          FROM cita c
            INNER JOIN horario h ON c.idhorario = h.idhorario   
            INNER JOIN mascota m ON m.idmascota = c.idmascota
            INNER JOIN productoservicio ps ON h.idproductoservicio = ps.idproductoservicio  
            INNER JOIN cliente cli ON c.idcliente = cli.idcliente
            WHERE c.estadoAtencion =0 and c.estadopago =1 and h.idveterinario = " . $value[7];

            $resultado = mysqli_query($conn, $sentencia1);


            $sentencia2 = "SELECT c.idcita, h.fecha AS fecha, m.nombre AS nombreMascota, ps.nombre AS servicio, 
                h.horarioinicio, h.horariofin, CONCAT(cli.nombres, ' ', cli.apellidos) 
                AS cliente, c.estadoAtencion, c.estadopago
          FROM cita c
            INNER JOIN horario h ON c.idhorario = h.idhorario   
            INNER JOIN mascota m ON m.idmascota = c.idmascota
            INNER JOIN productoservicio ps ON h.idproductoservicio = ps.idproductoservicio  
            INNER JOIN cliente cli ON c.idcliente = cli.idcliente
            WHERE c.estadoAtencion =1 and c.estadopago =1  and h.idveterinario = " . $value[7];

            $resultado2 = mysqli_query($conn, $sentencia2);
            ?>


            <p class='textoVeterinario'>Bienvenido a su reporte de citas, Dr. <?php echo $value[0] . " " . $value[1] ?>
            </p>

            <div class="contenedorGeneralEstadisticas">
                <div class="contenedorPrincipalCitas">
                    <div class="tab">
                        <button class="tablinks" data-target="tablaCitasPendientes"
                            onclick="cambiarTab('tablaCitasPendientes')">Citas Programadas</button>
                        <button class="tablinks" data-target="tablaCitasRealizadas"
                            onclick="cambiarTab('tablaCitasRealizadas')">Citas Realizadas</button>

                    </div>
                    <div id="tablaCitasPendientes" class="tablaCitas active">
                        <!-- Tabla de citas programadas -->
                        <table>
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Fecha</th>
                                    <th>Servicio</th>
                                    <th>Horario</th>
                                    <th>Cliente</th>
                                    <th>Mascota</th>
                                    <th>Pago</th>

                                    <th>Atención</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                              while ($registro = mysqli_fetch_assoc($resultado)) {
    echo '<tr>';
    echo '<td>' . $registro['idcita'] . '</td>';
    $fechaFormateada = date('d/m/Y', strtotime($registro['fecha']));
    echo '<td>' . $fechaFormateada . '</td>';
    echo '<td>' . $registro['servicio'] . '</td>';
    $horarioInicio = date('h:i A', strtotime($registro['horarioinicio']));
    $horarioFin = date('h:i A', strtotime($registro['horariofin']));
    echo '<td>' . $horarioInicio . ' - ' . $horarioFin . '</td>';
    echo '<td>' . $registro['cliente'] . '</td>';
    echo '<td>' . $registro['nombreMascota'] . '</td>';

    if ($registro['estadopago'] == '1') {
        echo '<td>Realizado</td><td>';
        echo '<select class="estado" data-cita-id="' . $registro['idcita'] . '" onchange="actualizarEstadoCita(this, ' . $value[7] . ')">';
        echo '<option value="0" ' . ($registro['estadoAtencion'] == '0' ? 'selected' : '') . '>Pendiente</option>';
        echo '<option value="1" ' . ($registro['estadoAtencion'] == '1' ? 'selected' : '') . '>Atendido</option>';
        echo '</select>';
        echo '</td>';
    }

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
                                while ($registro = mysqli_fetch_assoc($resultado2)) {
                                    echo '<tr>';
                                    echo '<td >' . $registro['idcita'] . '</td>';
                                    $fechaFormateada = date('d/m/Y', strtotime($registro['fecha']));
                                    echo '<td>' . $fechaFormateada . '</td>';
                                    echo '<td>' . $registro['servicio'] . '</td>';
                                    $horarioInicio = date('h:i A', strtotime($registro['horarioinicio']));
                                    $horarioFin = date('h:i A', strtotime($registro['horariofin']));
                                    echo '<td>' . $horarioInicio . ' - ' . $horarioFin . '</td>';
                                    echo '<td>' . $registro['cliente'] . '</td>';
                                    echo '<td>' . $registro['nombreMascota'] . '</td>';
                                
                                    if ($registro['estadopago'] == '1') {
                                        echo '<td>Realizado</td><td>';
                                        echo '<select class="estado" data-cita-id="' . $registro['idcita'] . '" onchange="actualizarEstadoCita(this, ' . $value[7] . ')">';
                                        echo '<option value="0" ' . ($registro['estadoAtencion'] == '0' ? 'selected' : '') . '>Pendiente</option>';
                                        echo '<option value="1" ' . ($registro['estadoAtencion'] == '1' ? 'selected' : '') . '>Atendido</option>';
                                        echo '</select>';
                                        echo '</td>';
                                        echo '</tr>';
                                    } else {
                                        echo 'No se encontraron Registros';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            <?php
            include('../Veterinario/editarVeterinario/modalEditarVeterinario.php');
            ?>


            <?php
            include('components/footerVeterinario.php');
            ?>
            <?php
            include('cerrarSesionVet/closeSessionVet.php');
            ?>


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

<!-- Aquí va tu código HTML previo -->

<script>
function actualizarEstadoCita(selectElement) {
  const idCita = selectElement.dataset.citaId;
  const nuevoEstado = selectElement.value;

  // Mostrar confirmación antes de realizar la actualización
  if (confirm("¿Estás seguro de cambiar el estado de esta cita?" + ' nuevo estado' + nuevoEstado + ' idcita' + idCita)) {
    $.ajax({
      type: "POST",
      url: "actualizar_estado_cita.php",
      data: {
        idCita: idCita,
        nuevoEstado: nuevoEstado,
      },
      success: function (response) {
        // Manejar la respuesta del servidor si es necesario
        console.log(response);
        // Recargar la página después de la actualización exitosa
        location.reload();
      },
      error: function (xhr, status, error) {
        // Manejar errores si los hubiera
        console.error(xhr);
      },
    });
  } else {
    // Si el usuario cancela, restauramos el valor original del select
    selectElement.value = selectElement.dataset.estadoOriginal;
  }
}
</script>





            <script src="../../js/previsualizarImagen.js"></script>
            <script src="../../js/Interacciones.js"></script>
            <script src="cerrarSesionVet/closeSessionVet.js"></script>

</body>

</html>