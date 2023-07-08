<?php
// Obtén los parámetros enviados por POST
require '../../../controlador/conexion.php';
$conn = conectar();

$id = $_POST['id'];
$checked = $_POST['checked'];

// Valida que los parámetros sean correctos
if (!empty($id) && ($checked == '0' || $checked == '1')) {
    // Actualiza el estado en la base de datos
    $estado = ($checked == '1') ? '2' : '3'; // Cambia el estado según el valor de $checked
    $sql = "UPDATE usuario SET estado = '$estado' WHERE idusuario = '$id'";
    $result = mysqli_query($conn, $sql);

    // Verifica si la actualización fue exitosa
    if ($result) {
        $estadoTexto = ($estado == '2') ? 'Habilitado' : 'Deshabilitado'; // Cambia el texto del estado según el nuevo valor de $estado
        $response = array(
            'status' => 'success',
            'message' => 'Estado actualizado exitosamente. Nuevo estado: ' . $estadoTexto
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error al actualizar el estado en la base de datos'
        );
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Parámetros inválidos'
    );
}

// Enviar la respuesta en formato JSON
echo json_encode($response);
?>
