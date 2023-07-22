<?php
// actualizar_estado_cita.php

require('../../controlador/conexion.php');
$conn = conectar();

// Obtener los datos enviados desde la solicitud AJAX
if (isset($_POST['idCita']) && isset($_POST['nuevoEstado'])) {
    $idCita = $_POST['idCita'];
    $nuevoEstado = $_POST['nuevoEstado'];
   

    // Actualizar el estado de la cita en la base de datos
    $sentencia = "UPDATE cita SET estadoAtencion = '$nuevoEstado' WHERE idcita = '$idCita'";
    $resultado = mysqli_query($conn, $sentencia);

    if ($resultado) {
        // La actualización fue exitosa
        echo "Estado actualizado correctamente.";
    } else {
        // Hubo un error en la actualización
        echo "Error al actualizar el estado.";
    }
} else {
    echo "Datos insuficientes para realizar la actualización.";
}
?>
