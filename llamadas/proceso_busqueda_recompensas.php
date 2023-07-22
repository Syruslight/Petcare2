<?php
// Conectarse a la base de datos y obtener el término de búsqueda enviado por Ajax
require('../controlador/conexion.php');
$conn = conectar();
$query = $_POST['query'];

// Realizar la consulta a la base de datos con INNER JOIN
$sql = "SELECT recompensas.*, productoservicio.nombre as nombre_producto, productoservicio.precio as precio_producto
        , productoservicio.fotoProductoServicio as foto FROM recompensas
        INNER JOIN productoservicio ON recompensas.idproductoservicio = productoservicio.idproductoservicio
        WHERE productoservicio.nombre LIKE '%$query%'";

$result = $conn->query($sql);

$output = '';
if ($result->num_rows > 0) {
    // Construir la tabla de resultados
    $output = '   <div class="wrapper-tablePeti">';
    while ($row = $result->fetch_assoc()) {
        $output .= '  <div class="wrapper-resultPeti">

        <div class="result-itemtPeti">
        <img class="image-petiProduct" src="../../../imagenes/productos_servicios/productservices/' . $row['foto'] . '" alt="dog" width="60px" height="60px">
        <div class="result-infoPeti">

        <span class="table-nameFoodPeti">' . $row['nombre_producto'] . '</span>
                      <span class="table-pointsPeti">' . $row['puntos'] . ' Pts.</span>
                      <div class="toogleBtn-petiPuntos">
                      <label class="toggle-btn">
                          <input type="checkbox" id="toggle>" checked>
                          <span class="slider"></span>
                      </label>
                      <span id="estado">Activado</span>
                  </div>
                  </div>
                  <img onclick="openModalEdithPetiPunto(' . $row['idrecompensa'] . ', \'' . $row['nombre_producto'] . '\', ' . $row['puntos'] . ')" id="open-edithPetiPunto" class="modal-imagenPeti" src="../../../imagenes/perfilAdmin/editedit.png" alt="edit">
                    </div>
                  '                  
                  ;
    }
    $output .= '</div>';
} else {
    $output = '<div class="dates-tablePeti">No se encontraron resultados.</div>';
}

echo $output; // Envio de datos
$conn->close();
?>

