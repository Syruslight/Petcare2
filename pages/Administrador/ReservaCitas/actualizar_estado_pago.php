<?php
require('../../../controlador/conexion.php');
$conn = conectar();

/// Obtener los datos enviados por la solicitud AJAX
$idCita = $_POST['idCita'];
$nuevoEstado = $_POST['nuevoEstado'];

// Realizar la actualización en la base de datos utilizando la variable $idCita y $nuevoEstado

// Ejemplo de actualización con sentencia preparada
$stmt = $conn->prepare("UPDATE cita SET estadopago = ? WHERE idcita = ?");
$stmt->bind_param("ii", $nuevoEstado, $idCita);
if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'error';
}
?>
