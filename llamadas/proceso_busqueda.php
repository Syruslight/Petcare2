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
$sql = "SELECT * FROM cliente WHERE nombres LIKE '%$query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Construir la tabla de resultados
  $output = '<div class="wrapper-dates">';
  $output .= '<div class="dates-name">';
  $output .= '<span class="text-dates">Nombre</span>';
  $output .= '<span class="text-dates">Apellidos </span>';

  while ($row = $result->fetch_assoc()) {
    $output .= '<div class="client-information">';
    
    $output .= '<div class="name-lastname">';
    $output .= '<span class="first-name">' . $row['nombres'] . '</span>';
    $output .= '<span class="last-name">' . $row['apellidos'] . '</span>';
    $output .= '</div>';
    $output .= '</div>';
  }

  $output .= '</div>';
  $output .= '</div>';
} else {
  // No se encontraron resultados
  $output = 'No se encontraron resultados.';
}

// Devolver los resultados al cliente
echo $output;

// Cerrar la conexión a la base de datos
$conn->close();
?>
