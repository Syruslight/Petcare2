<?php
require('../controlador/conexion.php');
$conn = conectar();

// Obtener el término de búsqueda enviado por Ajax
$query = $_POST['query'];

// Realizar la consulta a la base de datos
$sql = "SELECT productoservicio.idproductoservicio, productoservicio.nombre, productoservicio.precio, productoservicio.descripcion, productoservicio.fotoProductoServicio,
        tipoproductoservicio.nombre as tipoProducto 
        FROM productoservicio INNER JOIN tipoproductoservicio ON productoservicio.idtipoproductoservicio = tipoproductoservicio.idtipoproductoservicio 
        WHERE productoservicio.nombre LIKE '%$query%' AND productoservicio.idtipoproductoservicio NOT IN ('2', '7', '12')
        AND tipoproductoservicio.estado = 1";


$result = $conn->query($sql);

$output='';

if ($result->num_rows > 0) {
  // Construir la tabla de resultados
  $output = '<div class="wrapper-results">';
  foreach ($result as $row) {
      $output .= '<div class="result-item">
                      <img class="image-product" src="../../../imagenes/productos_servicios/productos/'. $row['fotoProductoServicio'] . '" width="60" height="60">
                      <div class="result-info">
                          <span class="table-nameFood">' . $row['nombre'] . '</span>
                          <span class="item table-type">' . $row['tipoProducto']. '</span>
                          <span class="table-price">S./' . $row['precio'] . '</span>
                          <span class="table-description">' . $row['descripcion'] . '</span>
                      </div>
                      <img class="openModalEdithProduct" onclick="openModalEdithProduct(event)" data-nombreproducto="' . $row['nombre'] . '"
    data-precioproducto="' . $row['precio'] . '" data-descripcionproducto="' . $row['descripcion'] . '" data-tipoproducto="' . $row['tipoProducto'] . '"
    data-fotoproducto="' . $row['fotoProductoServicio'] . '"  data-idproducto="' . $row['idproductoservicio'] . '"
    src="../../../imagenes/perfilAdmin/editedit.png" width="45" height="40">

                  </div>';
  }
  $output .= '</div>';
} else {
  $output = '<div class="dates-table">No se encontraron resultados.</div>';
}


echo $output; //Envio de datos
$conn->close();
?>
