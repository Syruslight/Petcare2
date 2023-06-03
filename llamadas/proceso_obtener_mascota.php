<?php
require('../controlador/conexion.php');
$conn = conectar();

// Obtener el ID de la mascota enviado por Ajax
$idMascota = $_POST['idMascota'];

// Realizar la consulta a la base de datos para obtener los datos de la mascota
$sql = "SELECT *, CONCAT(
  FLOOR(DATEDIFF(CURRENT_DATE(), fechaNac) / 365), ' años ') 
  AS edadAnos, CONCAT(
  MOD(FLOOR(DATEDIFF(CURRENT_DATE(), fechaNac) / 30.436875), 12), ' meses') 
  AS edadMeses FROM mascota WHERE idmascota = $idMascota";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $mascota = $result->fetch_assoc();
    echo json_encode($mascota);
} else {
    echo json_encode(null);
}

$conn->close();
?>
