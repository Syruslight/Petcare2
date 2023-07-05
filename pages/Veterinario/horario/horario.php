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
    <link rel="stylesheet" href='../veterinario.css'>
    <link rel="stylesheet" href='../horario/horarioEstilo.css'>
    <link rel="stylesheet" href='../../Veterinario/editarVeterinario/estiloModalVeterinario.css'>
    <title>Pagina de Veterinario</title>
</head>

<body>
    <div class="wrapper">
        <div class="profile">
            <?php
            include('../components/navListVeterinario.php');
            ?>
        </div>


        <div class="dash-information">
            <?php
            include('../components/headerVeterinario.php');
            ?>





<section class="modalHorario">
        <div class="modalHorario__container">
            <div class="cuadro_modalHorario">
                <div class="top-formHorario">
                    <div class="tituloHorario">
                        <h2 class="tituloform">Editar Datos</h2>
                    </div>
                    <div id="cloaseModalHorario">
                        &#10006
                    </div>
                </div>
                <form action="" enctype="multipart/form-data"
                   

                </form>

            </div>
        </div>
    </section>






                 <?php






$sentencia1 = "SELECT h.*, sp.nombre, sp.precio
               FROM horario h
               INNER JOIN productoservicio sp ON h.idproductoservicio = sp.idproductoservicio
               WHERE h.idveterinario = " . $value[7] . "
               ORDER BY h.idhorario DESC";

$resultado = mysqli_query($conn, $sentencia1);

if ($resultado) {
    $registros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    
    // Mostrar las estadísticas y la tabla de citas en el código HTML
    echo '

<div class="contenedorHorario">
 <h2>Registro de Horario</h2>
                <div class="contenedorSuperiorHorario">
                    <div class="barraBusqueda">
                    <img src="../../../imagenes/busquedaCita.png" alt="lupa">
                        <input type="text" placeholder="Buscar horario">
                    </div>
                    <div class="filtroSeleccion">
                        <label for="">Estado: </label>
                        <select id="opcionHorario" name="opciones">
                            <option value="opcionTotal">Seleccionar</option>
                            <option value="opcionAtendido">Activado</option>
                            <option value="opcioneDesactivado">Desactivado</option>
                        </select>
                    </div>
                    <div class="botonHorario">
                    <button onclick="openModalHorario()" >+ Generar Horario</button>
                    </div>

                </div>
                <div class="contenedorTablaHorario">
                <table class="tablaHorario">
        <thead>
            <tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Horario Inicio</th>
                <th>Horario Fin</th>
                <th>Servicio</th>
                <th>Precio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>';

    foreach ($registros as $registro) {
        echo '<tr>';
        echo '<td id="fecha">' . $registro['idhorario'] . '</td>';
        $fechaFormateada = date('d/m/Y', strtotime($registro['fecha']));
        echo '<td>' . $fechaFormateada . '</td>';
        echo '<td>' . date('h:i A', strtotime($registro['horarioinicio'])) . '</td>';
        echo '<td>' . date('h:i A', strtotime($registro['horariofin'])) . '</td>';
        echo '<td>' . $registro['nombre'] . '</td>';
        echo '<td>' . $registro['precio'] . '</td>';

        echo '<td>
            <select class="estado">
              <option value="pendiente" ' . ($registro['estado'] == '0' ? 'selected' : '') . '>Activado</option>
              <option value="atendido" ' . ($registro['estado'] == '1' ? 'selected' : '') . '>Desactivado</option>
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
                include('../../Veterinario/editarVeterinario/modalEditarVeterinario.php');
                ?>


                <?php
                include('../components/footerVeterinario.php');
                ?>
<script>
// Obtener la tabla y el selector de estado
var tablaCitas = document.querySelector('.tablaHorario');
var selectorEstado = document.getElementById('opcionHorario');

// Agregar evento change al selector de estado
selectorEstado.addEventListener('change', function() {
    var estadoSeleccionado = this.value;

    // Mostrar todas las filas de la tabla
    var filas = tablaCitas.querySelectorAll('tbody tr');
    filas.forEach(function(fila) {
        fila.style.display = '';
    });

    // Filtrar la tabla según el estado seleccionado
    if (estadoSeleccionado === 'opcionActivado') {
        filtrarTablaPorEstado('Activado');
    } else if (estadoSeleccionado === 'opcionDesactivado') {
        filtrarTablaPorEstado('Desactivado');
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
<script src="../../../js/Interacciones.js"></script>
                <script src="../../js/previsualizarImagen.js"></script>
                <script src="../../js/Interacciones.js"></script>

</body>

</html>