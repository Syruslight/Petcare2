<?php
require '../controlador/conexion.php';
$conn = conectar();

$idMascota = $_REQUEST['idMascota'];
$nombre = $_REQUEST['nombreMascota'];
$peso = $_REQUEST['peso'];
$esterilizado = $_REQUEST['esterilizado'];
$etapa = $_REQUEST['etapa'];
$fotoMascota = $_FILES['subirFotoMascota']['name'];
$ruta = $_FILES['subirFotoMascota']['tmp_name'];

// Obtener la foto anterior del formulario
$foto_anterior = $_REQUEST['foto2'];


// Verificar si se ha seleccionado una nueva foto
if (!empty($fotoMascota)) {
	// Se ha seleccionado una nueva foto, guardarla y actualizar la variable $foto
	$fotuser = "../imagenes/fotosperfil/mascota/" . $fotoMascota;
	copy($ruta, $fotuser);
} else {
	// No se ha seleccionado una nueva foto, utilizar la foto anterior
	$fotoMascota = $foto_anterior;
}


if ($_REQUEST['esterilizado'] == 'SI') {

} elseif ($_REQUEST['esterilizado'] == 'NO') {

}

actualizarDatosMascota($idMascota, $nombre, $peso, $esterilizado, $etapa  , $fotoMascota, $conn);
	header('Location: ../pages/Mascota/mascotaIndex.php');
?>