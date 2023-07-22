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
            WHERE h.idveterinario = " . $value[7];

$resultado = mysqli_query($conn, $sentencia1);

if ($resultado) {
    $registros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

  
  
    echo "<p class='textoVeterinario'>Bienvenido a su reporte de citas, Dr. " . $value[0] ." ".  $value[1] .".</p>";// Mostrar las estadísticas y la tabla de citas en el código HTML
    echo '
    <div class="contenedorGeneralEstadisticas">
    
     
<div class="contenedorCitas">
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
                            <option value="opcionAtendido">Atendido</option>
                            <option value="opcionCancelado">Cancelado</option>
                        </select>
                    </div>
                    <div class="filtroFecha">
                        <label for="">Fecha </label>
                        <input id="filtrarFecha" type="date">
                    </div>

                </div>
    <table class="tablaCitas">
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
        <tbody>';

        foreach ($registros as $registro) {
            // Check if estadopago is equal to 1
            if ($registro['estadopago'] == '1') {
                echo '<tr>';
                echo '<td id="fecha">' . $registro['idcita'] . '</td>';
                $fechaFormateada = date('d/m/Y', strtotime($registro['fecha']));
                echo '<td>' . $fechaFormateada . '</td>';
                echo '<td>' . $registro['servicio'] . '</td>';
                $horarioInicio = date('h:i A', strtotime($registro['horarioinicio']));
                $horarioFin = date('h:i A', strtotime($registro['horariofin']));
                echo '<td>' . $horarioInicio . ' - ' . $horarioFin . '</td>';
                echo '<td>' . $registro['cliente'] . '</td>';
                echo '<td>' . $registro['nombreMascota'] . '</td>';

                if($registro['estadopago'] == '1')
                echo '<td>Realizado</td><td>
                    <select class="estado">
                      <option value="pendiente" ' . ($registro['estadoAtencion'] == '0' ? 'selected' : '') . '>Pendiente</option>
                      <option value="atendido" ' . ($registro['estadoAtencion'] == '1' ? 'selected' : '') . '>Atendido</option>
                      <option value="cancelado" ' . ($registro['estadoAtencion'] == '2' ? 'selected' : '') . '>Cancelado</option>
                    </select>
                  </td>';
                echo '</tr>';
            }
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
                include('../Veterinario/editarVeterinario/modalEditarVeterinario.php');
                ?>


                <?php
                include('components/footerVeterinario.php');
                ?>
                   <?php
                include('cerrarSesionVet/closeSessionVet.php');
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




                <script src="../../js/previsualizarImagen.js"></script>
                <script src="../../js/Interacciones.js"></script>
                <script src="cerrarSesionVet/closeSessionVet.js"></script>

</body>

</html>