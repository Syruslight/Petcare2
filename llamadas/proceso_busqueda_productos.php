<?php
require('../controlador/conexion.php');
$conn = conectar();

// Obtener el término de búsqueda enviado por Ajax
$query = $_POST['query'];

// Realizar la consulta a la base de datos
$sql = "SELECT * FROM productoservicio WHERE nombre LIKE '%$query%' AND idtipoproductoservicio NOT IN ('1', '2', '3')";
$result = $conn->query($sql);

$output='';

if ($result->num_rows > 0) {
  // Construir la tabla de resultados
    foreach($result as $row) {
        $output = '     <div  class="dates-table">
                        <img class="image-product"src="../../../imagenes/perfilAdmin/foodPet.png" width=60 height=60>
                        <span class="table-nameFood">' . $row['nombre'] . '</span>
                        <span class="item table-type">test</span>
                        <span class="table-price">S./' . $row['precio'] . '</span>
                        <span class="table-description">' . $row['descripcion'] . '</span>
                        <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                        <img class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>';
                   
    }
        $output .= '</div>
                    <hr class="linea">';
  
} else {
    $output = ' <div  class="dates-table"> No se encontraron resultados. </div>';
}
echo $output;
$conn->close();
?>
