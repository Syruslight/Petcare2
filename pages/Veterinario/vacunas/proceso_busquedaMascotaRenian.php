<?php
// Conexión a la base de datos (ajusta los datos de conexión según tu configuración)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'petcare';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die('Error de conexión: ' . $conn->connect_error);
}

// Obtener el término de búsqueda enviado por Ajax
$query = $_POST['query'];

// Realizar la consulta a la base de datos
$sql = "SELECT idmascota, nombre FROM mascota WHERE renian = '$query'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $output = '';

  while ($row = $result->fetch_assoc()) {
    $output .= $row['idmascota'] . ';' . $row['nombre'];
  }
} else {
  $output = 'No se encontraron resultados.';
}

// Devolver los resultados al cliente
echo $output;

// Cerrar la conexión a la base de datos
$conn->close();
?>
