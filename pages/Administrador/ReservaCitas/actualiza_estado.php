<?php
require '../../../controlador/conexion.php';
$conn = conectar();

$idcita = $_POST['idcita'];
$nuevoEstado = $_POST['estado']; 

// Verificar si la actualización fue exitosa
if ($resultado) {
  echo 'Estado actualizado correctamente';
} else {
  echo 'Error al actualizar el estado en la base de datos';
}

actualizarEstadoPago($idcita, $nuevoEstado, $conn);
?>
