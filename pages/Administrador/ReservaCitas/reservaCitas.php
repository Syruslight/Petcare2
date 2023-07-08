<?php
require('../../../controlador/conexion.php');
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
    <link rel="stylesheet" href='../administradorProducts/administradorProducts.css'>
    <link rel="stylesheet" href='../../Veterinario/veterinario.css'>
    <link rel="stylesheet" href='reservarCitas.css'>
    <title>Pagina de Veterinario</title>
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
// Obtener los estados de las citas
$citasTotales = 0;
$citasRealizadas = 0;
$citasPendientes = 0;
$citasCanceladas = 0;

$sentencia1 = "SELECT c.idcita, h.fecha AS fecha, m.nombre AS nombreMascota, ps.nombre AS servicio,
h.horarioinicio, h.horariofin, CONCAT(cli.nombres, ' ', cli.apellidos) AS cliente,
c.estadopago, c.estadoAtencion, v.nombres, v.apellidos
FROM cita c
INNER JOIN horario h ON c.idhorario = h.idhorario
INNER JOIN mascota m ON m.idmascota = c.idmascota
INNER JOIN productoservicio ps ON h.idproductoservicio = ps.idproductoservicio
INNER JOIN cliente cli ON c.idcliente = cli.idcliente
INNER JOIN veterinario v ON h.idveterinario = v.idveterinario
ORDER BY
CASE c.estadopago
WHEN 0 THEN 0
WHEN 2 THEN 1
WHEN 3 THEN 2
ELSE 3
END,
fecha DESC;";

$resultado = mysqli_query($conn, $sentencia1);

if ($resultado) {
    $registros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    // Obtener la cantidad de citas en cada estado
    foreach ($registros as $registro) {
        $estado = $registro['estadoAtencion'];
        if ($estado == '1') {
            $citasRealizadas++;
        } elseif ($estado == '0') {
            $citasPendientes++;
        } elseif ($estado == '2') {
            $citasCanceladas++;
        }
        $citasTotales++;
    }
$idcita=$registro['idcita'];
    // Mostrar las estadísticas y la tabla de citas en el código HTML
    echo '
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
                    ' . $citasTotales . '
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
                    ' . $citasRealizadas . '
                </p>
            </div>
        </div>
        <div id="citasPendientes" class="contenedorUnitario">
            <div id="citasPendientes" class="contenedorImg">
                <img src="../../../imagenes/citasPendientes.png" alt="citasPendientes" width="69px" height="69px">
            </div>
            <div class="contenedorKPICitas">
                <p class="tituloCitas">
                    Citas Pendientes
                </p>
                <p class="numeroCitas">
                    ' . $citasPendientes . '
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
            ' . $citasCanceladas . '
        </p>
        </div>
    </div>
    </div>
<div class="contenedorReservarCitas">
 <h2>Citas Programadas</h2>
                <div class="contenedorSuperiorCitas">
                    <div class="barraBusqueda">
                        <img src="../../imagenes/busquedaCita.png" alt="">
                        <input type="text" placeholder="Buscar cita">
                    </div>
                    <div class="filtroSeleccion">
                        <label for="">Estado: </label>
                        <select id="opcionesCitas" name="opciones">
                            <option value="opcionTotal">Seleccionar</option>
                            <option value="opcionPendiente">Pendiente</option>
                            <option value="opcionAtendido">Realizado</option>
                            <option value="opcionCancelado">No realizado</option>
                        </select>
                    </div>
                    <div class="filtroFecha">
                        <label for="">Fecha </label>
                        <input id="filtrarFecha" type="date">
                    </div>

                </div>
                <div class="contenedorTablaCitas">
    <table class="tablaCitas">
        <thead>
            <tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Servicio</th>
                <th>Veterinario</th>
                <th>Horario</th>
                <th>Cliente</th>
                <th>Mascota</th>
                <th>Estado Pago</th>
            </tr>
        </thead>
        <tbody>';

    foreach ($registros as $registro) {
        echo '<tr>';
        echo '<td id="fecha">' . $registro['idcita'] . '</td>';
        $fechaFormateada = date('d/m/Y', strtotime($registro['fecha']));
        echo '<td>' . $fechaFormateada . '</td>';
        echo '<td>' . $registro['servicio'] . '</td>';
        echo '<td>' . $registro['nombres'] ." ". $registro['apellidos'] . '</td>';
        $horarioInicio = date('h:i A', strtotime($registro['horarioinicio']));
        $horarioFin = date('h:i A', strtotime($registro['horariofin']));
        
        echo '<td>' . $horarioInicio . ' - ' . $horarioFin . '</td>';
        echo '<td>' . $registro['cliente'] . '</td>';
        echo '<td>' . $registro['nombreMascota'] . '</td>';

        echo '<td>
  <select class="estado" onchange="cambiarEstado(this)">
    <option value="pendiente" ' . ($registro['estadopago'] == '0' ? 'selected' : '') . '>Pendiente</option>
    <option value="atendido" ' . ($registro['estadopago'] == '1' ? 'selected' : '') . '>Realizado</option>
    <option value="cancelado" ' . ($registro['estadopago'] == '2' ? 'selected' : '') . '>No Realizado</option>
  </select>
</td>';
        echo '</tr>';
    }

    echo '</tbody>
    </table>';
} else {
    // Manejar el error en caso de que la consulta falle
    echo 'Error al obtener los registros de la base de datos.';
}
echo '</div></div>'
?>

            
                <?php
                include('../components/footerAdministrador.php');
                ?>


<script>
// Obtener la tabla y el selector de estado
var tablaCitas = document.querySelector('.tablaCitas');
var selectorEstado = document.getElementById('opcionesCitas');

// Agregar evento change al selector de estado
selectorEstado.addEventListener('change', function() {
    var estadoSeleccionado = this.value;

    // Mostrar todas las filas de la tabla
    var filas = tablaCitas.querySelectorAll('tbody tr');
    filas.forEach(function(fila) {
        fila.style.display = '';
    });

    // Filtrar la tabla según el estado seleccionado
    if (estadoSeleccionado === 'opcionPendiente') {
        filtrarTablaPorEstado('pendiente');
    } else if (estadoSeleccionado === 'opcionAtendido') {
        filtrarTablaPorEstado('atendido');
    } else if (estadoSeleccionado === 'opcionCancelado') {
        filtrarTablaPorEstado('cancelado');
    }
});

// Función para filtrar la tabla por estado
function filtrarTablaPorEstado(estado) {
    var filas = tablaCitas.querySelectorAll('tbody tr');
    filas.forEach(function(fila) {
        var columnaEstado = fila.querySelector('.estado');
        if (columnaEstado.value !== estado) {
            fila.style.display = 'none';
        }
    });
}
</script>

<script>
function cambiarEstado(selectElement) {
  var nuevoEstado = selectElement.value;
  var confirmacion = confirm("¿Deseas cambiar el estado?");

  if (confirmacion) {
    // Obtener el ID de la cita desde el atributo data-idcita
    var idcita = selectElement.parentNode.dataset.idcita;

    // Enviar solicitud AJAX al servidor para actualizar el estado en la base de datos
    $.ajax({
      url: 'actualiza_estado.php',
      method: 'POST',
      data: { idcita: idCita, estado: nuevoEstado },
      success: function(response) {
        alert('Estado actualizado correctamente');
      },
      error: function(xhr, status, error) {
        console.log('Error al actualizar el estado');
        console.log(xhr.responseText);
      }
    });
  }
}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <script src="../../js/previsualizarImagen.js"></script>
                <script src="../../js/Interacciones.js"></script>

</body>

</html>