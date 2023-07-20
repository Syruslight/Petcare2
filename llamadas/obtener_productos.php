<?php
// obtener_productos.php

require_once '../controlador/conexion.php'; // Reemplaza con la ubicación correcta de tu archivo de conexión

// Obtener el idcategoria enviado por la solicitud AJAX
$idcategoria = $_GET['idcategoria'];

// Realizar la consulta SQL para obtener los productos correspondientes a la categoría seleccionada
$conn = conectar(); // Llama a tu función conectar() para obtener la conexión a la base de datos

$queryProductos = "SELECT idproductoservicio, nombre FROM productoservicio WHERE idtipoproductoservicio = ? ";
$stmtProductos = mysqli_prepare($conn, $queryProductos);
mysqli_stmt_bind_param($stmtProductos, "i", $idcategoria);
mysqli_stmt_execute($stmtProductos);
$resultProductos = mysqli_stmt_get_result($stmtProductos);

// Crear un array para almacenar los productos
$productos = array();

// Recorrer los resultados y añadir los productos al array
while ($rowProducto = mysqli_fetch_assoc($resultProductos)) {
    $producto = array(
        'idproductoservicio' => $rowProducto['idproductoservicio'],
        'nombre' => $rowProducto['nombre']
    );
    $productos[] = $producto;
}

// Devolver los productos en formato JSON
header('Content-Type: application/json');
echo json_encode($productos);
?>
