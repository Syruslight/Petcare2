<?php
require('../../../controlador/conexion.php');
$conn = conectar();

$tiposSeleccionados = json_decode($_GET['tipos']);

// Función para construir la tabla de resultados
function buildResultsTable($resultado) {
  $html = '<div class="wrapper-results">';
  while ($fila = mysqli_fetch_assoc($resultado)) {
    $html .= '<div class="result-item">
                <img class="image-product" src="../../../imagenes/productos_servicios/productos/' . $fila['fotoProductoServicio'] . '" width="60" height="60">
                <div class="result-info">
                  <span class="table-nameFood">' . $fila['nombre'] . '</span>
                  <span class="item table-type">' . $fila['tipoProducto'] . '</span>
                  <span class="table-price">S./' . $fila['precio'] . '</span>
                  <span class="table-description">' . $fila['descripcion'] . '</span>
                  <img class="openModalEdithProduct result-img" onclick="openModalEdithProduct(event)" data-nombreproducto="' . $fila['nombre'] . '"
                  data-precioproducto="' . $fila['precio'] . '" data-descripcionproducto="' . $fila['descripcion'] . '" data-tipoproducto="' . $fila['tipoProducto'] . '"
                  data-fotoproducto="' . $fila['fotoProductoServicio'] . '"  data-idproducto="' . $fila['idproductoservicio'] . '"
                  src="../../../imagenes/perfilAdmin/editedit.png" width="45" height="40">
                </div>
              </div>';
  }
  $html .= '</div>';
  return $html;
}

// Verificar si hay tipos seleccionados
if (count($tiposSeleccionados) > 0) {
  // Construir la lista de tipos de producto seleccionados para la consulta
  $tiposString = implode(',', $tiposSeleccionados);

  // Consulta modificada con filtro de tipos de producto y búsqueda por nombre
  $sql = "SELECT productoservicio.idproductoservicio, productoservicio.nombre, productoservicio.precio, productoservicio.descripcion, productoservicio.fotoProductoServicio,
          tipoproductoservicio.nombre as tipoProducto 
          FROM productoservicio 
          INNER JOIN tipoproductoservicio ON productoservicio.idtipoproductoservicio = tipoproductoservicio.idtipoproductoservicio 
          WHERE tipocategoria not like 'Servicio'
          AND tipoproductoservicio.estado = 1
          AND productoservicio.idtipoproductoservicio IN ($tiposString)";

  $resultado = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  // Construir la lista de resultados filtrados
  $html = '';
  if ($resultado->num_rows > 0) {
    $html = buildResultsTable($resultado);
  } else {
    $html = '<div class="dates-table">No se encontraron resultados.</div>';
  }
} else {
  // Consulta por defecto sin filtros
  $sql = "SELECT productoservicio.idproductoservicio, productoservicio.nombre, productoservicio.precio, productoservicio.descripcion, productoservicio.fotoProductoServicio,
          tipoproductoservicio.nombre as tipoProducto 
          FROM productoservicio 
          INNER JOIN tipoproductoservicio ON productoservicio.idtipoproductoservicio = tipoproductoservicio.idtipoproductoservicio 
          WHERE tipocategoria not like 'Servicio'
          AND tipoproductoservicio.estado = 1";

  $resultado = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  // Construir la lista de resultados por defecto
  if ($resultado->num_rows > 0) {
    $html = buildResultsTable($resultado);
  } else {
    $html = '<div class="dates-table">No se encontraron productos.</div>';
  }
}

echo $html; // Envío de datos

$conn->close();


?>
