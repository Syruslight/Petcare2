<?php
    require '../controlador/conexion.php';
    $conn = conectar();

    $idcliente = $_POST['idcliente'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE usuario SET nombres = ?, apellidos = ?, telefono = ?, direccion = ? WHERE idcliente = ?";

    // Prepara la declaración
    $stmt = $conn->prepare($sql);

    // Asocia los parámetros de la consulta con los valores
    $stmt->bind_param("ssssi", $nombres, $apellidos, $telefono, $direccion, $idcliente);

    // Ejecuta la consulta
    if ($stmt->execute()) {
    // La actualización se realizó correctamente
    echo "La actualización se realizó correctamente.";
    } else {
    // Ocurrió un error durante la actualización
    echo "Error al actualizar los datos: " . $stmt->error;
    }

    // Cierra la declaración y la conexión a la base de datos
    $stmt->close();
    $conn->close();
?>