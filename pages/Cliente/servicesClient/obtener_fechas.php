<?php
require('../../../controlador/conexion.php');
$conn = conectar();

// Obtener el id del producto/servicio seleccionado
$idproductoservicio = $_POST['idproductoservicio'];

// Realizar la consulta para obtener las fechas disponibles basadas en el id del producto/servicio
$fechasQuery = "SELECT DISTINCT fecha FROM horario WHERE estado != 1 AND idproductoservicio = $idproductoservicio ORDER BY fecha DESC";
$fechasResult = mysqli_query($conn, $fechasQuery);

// Verificar si se encontraron fechas
if (mysqli_num_rows($fechasResult) > 0) {
    $options = '<option value="">Seleccionar fecha</option>';
    while ($fechaRow = mysqli_fetch_assoc($fechasResult)) {
        $fecha = date('d/m/Y', strtotime($fechaRow['fecha']));
        $options .= "<option value='{$fechaRow['fecha']}'>$fecha</option>";
    }
} else {
    $options = '<option value="">No hay fechas disponibles</option>';
}

echo $options;
?>
