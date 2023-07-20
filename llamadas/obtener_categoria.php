<?php
// obtener_razas.php

require_once '../controlador/conexion.php'; // Reemplaza con la ubicación correcta de tu archivo de conexión

// Obtener el idespecie enviado por la solicitud AJAX
$idespecie = $_GET['idespecie'];

// Realizar la consulta SQL para obtener las razas correspondientes a la especie seleccionada
$conn = conectar(); // Llama a tu función conectar() para obtener la conexión a la base de datos

$queryRazas = "SELECT idtipoproductoservicio, nombre FROM tipoproductoservicio WHERE idespecie = ? and tipocategoria not like 'Servicio' and estado like 1";
$stmtRazas = mysqli_prepare($conn, $queryRazas);
mysqli_stmt_bind_param($stmtRazas, "i", $idespecie);
mysqli_stmt_execute($stmtRazas);
$resultRazas = mysqli_stmt_get_result($stmtRazas);

// Crear un array para almacenar las razas
$razas = array();

// Recorrer los resultados y añadir las razas al array
while ($rowRaza = mysqli_fetch_assoc($resultRazas)) {
    $raza = array(
        'idtipoproductoservicio' => $rowRaza['idtipoproductoservicio'],
        'nombre' => $rowRaza['nombre']
    );
    $razas[] = $raza;
}

// Devolver las razas en formato JSON
header('Content-Type: application/json');
echo json_encode($razas);
?>

