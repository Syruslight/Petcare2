<?php
require '../controlador/conexion.php';
$conn = conectar();

$idMascota = $_REQUEST['idMascota'];
$idRaza = '1';
$nombre = $_REQUEST['nombreMascota'];
$peso = $_REQUEST['peso'];
$esterilizado = 'si';
$etapa = $_REQUEST['etapa'];

$fotoMascota = $_FILES['fotoMascota']['nombreMascota'];
$ruta = $_FILES['fotoMascota']['tmp_name'];

// Obtener la foto anterior del formulario
$foto_anterior = $_REQUEST['foto2'];


// Verificar si se ha seleccionado una nueva foto
if (!empty($foto)) {
	// Se ha seleccionado una nueva foto, guardarla y actualizar la variable $foto
	$fotoMascota = "../imagenes/fotosperfil/mascota" . $fotoMascota;
	copy($ruta, $fotuser);
} else {
	// No se ha seleccionado una nueva foto, utilizar la foto anterior
	$fotoMascota = $foto_anterior;
}

actualizarDatosMascota($idMascota, $idRaza, $nombre, $peso, $esterilizado, $etapa  , $fotoMascota, $conn);
	header('Location: ../pages/Mascota/mascotaIndex.php');
?>