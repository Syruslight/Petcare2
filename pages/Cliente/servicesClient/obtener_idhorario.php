<?php
require('../../../controlador/conexion.php');
$conn = conectar();

if (isset($_POST['veterinarioSeleccionado']) && isset($_POST['fechaSeleccionada']) && isset($_POST['tiempoServicioSeleccionado'])&& isset($_POST['idProductoServicio'])) {
    $veterinarioSeleccionado = $_POST['veterinarioSeleccionado'];
    $fechaSeleccionada = $_POST['fechaSeleccionada'];
    $tiempoServicioSeleccionado = $_POST['tiempoServicioSeleccionado'];
    $idProductoServicio = $_POST['idProductoServicio'];
   


    // Realiza una consulta para obtener el idhorario basado en el veterinario, la fecha y el tiempo de servicio
    $query = "SELECT idhorario FROM horario WHERE fecha = '$fechaSeleccionada' AND idveterinario = '$veterinarioSeleccionado' AND CONCAT(horarioinicio, '-', horariofin) = '$tiempoServicioSeleccionado' and idproductoservicio = '$idProductoServicio'";
    $result = mysqli_query($conn, $query);

    // Verifica si se encontró el idhorario
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $idHorario = $row['idhorario'];
        echo $idHorario;
    } else {
    
    }
}
?>
