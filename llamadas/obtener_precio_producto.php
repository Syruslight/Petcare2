<?php
// obtener_precio_producto.php

require_once '../controlador/conexion.php'; // Reemplaza con la ubicación correcta de tu archivo de conexión

// Obtener el idproducto enviado por la solicitud AJAX
$idProducto = $_GET['idproducto'];

// Realizar la consulta SQL para obtener el precio del producto
$conn = conectar(); // Llama a tu función conectar() para obtener la conexión a la base de datos

$queryPrecio = "SELECT precio FROM productoservicio WHERE idproductoservicio = ?";
$stmtPrecio = mysqli_prepare($conn, $queryPrecio);
mysqli_stmt_bind_param($stmtPrecio, "i", $idProducto);
mysqli_stmt_execute($stmtPrecio);
$resultPrecio = mysqli_stmt_get_result($stmtPrecio);

// Obtener el precio del producto desde la base de datos
if ($rowPrecio = mysqli_fetch_assoc($resultPrecio)) {
    $precio = $rowPrecio['precio'];
} else {
    $precio = "Precio no disponible";
}

// Devolver el precio en formato JSON
header('Content-Type: application/json');
echo json_encode(array('precio' => $precio));
?>
