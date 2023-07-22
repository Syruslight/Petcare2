<?php
require('../controlador/conexion.php');
$conn = conectar();

// Obtener el término de búsqueda enviado por Ajax
$query = $_POST['query'];

// Realizar la consulta a la base de datos
$sql = "SELECT c.codigo, CONCAT(cli.nombres, ' ' ,cli.apellidos) as nombrecompleto, pro.nombre, c.estado
FROM canje c
INNER JOIN cliente cli ON c.idcliente = cli.idcliente
INNER JOIN recompensas re ON c.idrecompensa = re.idrecompensa
INNER JOIN productoservicio pro ON pro.idproductoservicio = re.idproductoservicio
WHERE c.codigo LIKE '%$query%' OR c.estado LIKE '%$query%' OR cli.nombres LIKE '%$query%' OR cli.apellidos LIKE '%$query%' OR pro.nombre LIKE '%$query%' LIMIT 10
";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Construir la tabla de resultados
  $output = '<div class="tittle-tablePeti">
                <div class="row-tablePeti">
              <span class="tittle-textProductPeti">Codigo</span>
              <span class="tittle-textPointPeti">Cliente</span>
              <span class="tittle-textPricePeti">Producto</span>
              <span class="tittle-textActionPeti">Estado</span>
                </div>
            </div>
            <div class="wrapper-tablePeti">
                    <div class="wrapper-resultPeti">';
                       
                
        foreach($result as $row) {

        $output .= ' <div class="result-itemtPeti">
        <div class="result-infoPeti">
                <span class="table-nameFoodPeti">' . $row['codigo'] . '</span>
                            <span class="table-pointsPeti">' . $row['nombrecompleto'] . '</span>
                            <span class="table-pointsPeti">' . $row['nombre'] . '</span>
                            </div>';
                            if($row['estado']==0){
         $output .= '       <div class="toogleBtn-petiPuntos">
                                <label class="toggle-btn">
                                    <input type="checkbox" id="toggle">
                                    <span class="slider"></span>
                                    </label>
                                    <span id="estado">No canjeado</span>
                            </div>';
                            }else{
        $output .= '        <div class="toogleBtn-petiPuntos">
                                <label class="toggle-btn">
                                    <input type="checkbox" id="toggle">
                                    <span class="slider"></span>
                                    </label>
                                    <span id="estado">canjeado</span>
                                </div>';
                            }
                            $output .= ' </div>
                            </div>';        
                       
        }
        
  $output .= ' 
                    </div>';

} else {
  // No se encontraron resultados
  $output = 'No se encontraron resultados.';
}

// Devolver los resultados al cliente
echo $output;

// Cerrar la conexión a la base de datos
$conn->close();
?>