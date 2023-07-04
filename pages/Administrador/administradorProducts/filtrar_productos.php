<?php
require '../../../controlador/conexion.php';
$conn = conectar();

$tiposSeleccionados = json_decode($_GET['tipos']);
$query = $_GET['busqueda'];

// Construir la lista de tipos de producto seleccionados para la consulta
$tiposString = implode(',', $tiposSeleccionados);

// Consulta modificada con filtro de tipos de producto
$sql = "SELECT productoservicio.idproductoservicio, productoservicio.nombre, productoservicio.precio, productoservicio.descripcion, productoservicio.fotoProductoServicio,
        tipoproductoservicio.nombre as tipoProducto 
        FROM productoservicio 
        INNER JOIN tipoproductoservicio ON productoservicio.idtipoproductoservicio = tipoproductoservicio.idtipoproductoservicio 
        WHERE productoservicio.nombre LIKE '%$query%' 
        AND productoservicio.idtipoproductoservicio NOT IN ('1', '2', '3')
        AND tipoproductoservicio.estado = 1
        AND productoservicio.idtipoproductoservicio IN ($tiposString)";

$resultado = mysqli_query($conn, $sql) or die(mysqli_error($conn));

// Construir la lista de resultados filtrados
$html = '';
while ($fila = mysqli_fetch_assoc($resultado)) {
  // Construir los elementos de la lista de resultados
  $html .= '<div class="item-producto">';
  $html .= '<span class="texto-producto">' . $fila['nombre'] . '</span>';
  $html .= '<span class="texto-tipo">' . $fila['tipoProducto'] . '</span>';
  $html .= '<span class="texto-precio">' . $fila['precio'] . '</span>';
  $html .= '<span class="texto-descripcion">' . $fila['descripcion'] . '</span>';
  $html .= '<span class="texto-accion">Acción</span>';
  $html .= '</div>';
}

echo $html;
?>
