<?php
require '../controlador/conexion.php';
$conn = conectar();

$idCliente = $_POST['idClienteCita'];
$idMascota = $_POST['idMascotaCita'];
$idhorario = $_POST['inputIdHorario'];
$estadoPago = 0;
$estadoAtencion = 0;

$idHorario = $_POST['inputIdHorario'];
$sql = "UPDATE horario SET estado = 1 WHERE idhorario = $idHorario";

if ($conn->query($sql) === TRUE) {
    echo "El estado del horario se actualizó correctamente a 1.";
} else {
    echo "Error al actualizar el estado del horario: " . $conn->error;
}



$fotoComprobante = "";
if (!empty($_FILES['fotoComprobantePago']['name'])) {
    $fotoComprobante = $_FILES['fotoComprobantePago']['name'];
    $ruta = $_FILES['fotoComprobantePago']['tmp_name'];
}

if (!empty($fotoComprobante)) {
    $rutaDestino = "../imagenes/comprobanteFoto/";
    if (!is_dir($rutaDestino)) {
        mkdir($rutaDestino, 0755, true);
    }
    $fotRutaMascota = $rutaDestino . $fotoComprobante;
    move_uploaded_file($ruta, $fotRutaMascota);
}


agregarCita( $idCliente, $idMascota, $idhorario, $estadoPago, $fotoComprobante, $estadoAtencion,  $conn);
header('Location: ../pages/Mascota/mascotaIndex.php');
?>
