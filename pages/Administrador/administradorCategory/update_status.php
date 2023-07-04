<?php
// Obtén los parámetros enviados por POST
require '../../../controlador/conexion.php';
$conn = conectar();

$id = $_POST['id'];
$checked = $_POST['checked'];

// Valida que los parámetros sean correctos
if (!empty($id) && ($checked == '0' || $checked == '1')) {
    // Realiza la actualización del estado en la base de datos
    $estado = $checked;
    $sql = "UPDATE tipoproductoservicio SET estado = '$estado' WHERE idtipoproductoservicio = '$id'";
    $result = mysqli_query($conn, $sql);
    
    // Verifica si la actualización fue exitosa
    if ($result) {
        echo "Estado actualizado exitosamente";
    } else {
        echo "Error al actualizar el estado en la base de datos";
    }
} else {
    echo "Parámetros inválidos";
}
?>
