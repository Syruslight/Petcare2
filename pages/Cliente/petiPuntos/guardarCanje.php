<?php
// guardarCanje.php

// Aquí deberías tener tu conexión a la base de datos ($conn)

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idProducto'])) {
    $idProducto = $_POST['idProducto'];

    // Generar un código aleatorio de 7 dígitos
    $codigoCanje = mt_rand(1000000, 9999999);

    // Aquí deberías realizar el INSERT a tu tabla de canjes utilizando $idProducto y $codigoCanje

    // En este ejemplo, se devolverá el código generado como JSON
    echo json_encode(['codigoCanje' => $codigoCanje]);
} else {
    echo json_encode(['error' => 'Error al procesar la solicitud']);
}

?>
