<?php
require '../controlador/conexion.php';
$conn = conectar();

$idMascota = $_REQUEST['idMascota'];
$nombre = $_REQUEST['nombre'];
$peso = $_REQUEST['peso'];
$color = $_REQUEST['color'];

$foto = $_FILES['foto']['name'];
$ruta = $_FILES['foto']['tmp_name'];

// Obtener la foto anterior del formulario
$foto_anterior = $_REQUEST['foto2'];


// Verificar si se ha seleccionado una nueva foto
if (!empty($foto)) {
	// Se ha seleccionado una nueva foto, guardarla y actualizar la variable $foto
	$fotuser = "../imagenes/fotosperfil/" . $foto;
	copy($ruta, $fotuser);
} else {
	// No se ha seleccionado una nueva foto, utilizar la foto anterior
	$foto = $foto_anterior;
}

actualizarDatosMascota($idMascota, $nombre, $peso, $color, $fotoPerfil, $conn);
header('Location: ../pages/Mascota/mascotaIndex.php');
?>