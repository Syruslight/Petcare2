<?php
require('../../../controlador/conexion.php');
$conn = conectar();

// Resto del código de conexión a la base de datos y verificación de la sesión

if (isset($_POST['fechaSeleccionada']) && isset($_POST['idproductoservicio'])) {
    $fechaSeleccionada = $_POST['fechaSeleccionada'];
    $idproductoservicio = $_POST['idproductoservicio'];

    // Realiza una consulta para obtener los veterinarios que tengan cita en la fecha seleccionada y el producto/servicio correspondiente
    $query = "SELECT distinct v.idveterinario, v.nombres, v.apellidos FROM horario h INNER JOIN veterinario v ON h.idveterinario = v.idveterinario WHERE h.fecha = '$fechaSeleccionada' AND h.estado != 1 AND h.idproductoservicio = $idproductoservicio";
    $result = mysqli_query($conn, $query);

    // Verifica si se encontraron veterinarios
    if (mysqli_num_rows($result) > 0) {
        echo '<option value="">Seleccionar veterinario</option>'; // Opción por defecto

        while ($row = mysqli_fetch_assoc($result)) {
            $idVeterinario = $row['idveterinario'];
            $nombres = $row['nombres'];
            $apellidos = $row['apellidos'];

            echo "<option value='$idVeterinario'>$nombres $apellidos</option>";
        }
    } else {
        echo '<option value="">No se encontraron veterinarios disponibles</option>';
    }
}
?>


