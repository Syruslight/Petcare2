<?php
require '../controlador/conexion.php';
$conn = conectar();

$idCliente = $_REQUEST['idcliente'];
$nombres = $_REQUEST['nombres'];
$apellidos = $_REQUEST['apellidos'];
$telefono = $_REQUEST['telefono'];
$dni = $_REQUEST['dni'];
$direccion = $_REQUEST['direccion'];


$foto = $_FILES['foto']['name'];
$ruta = $_FILES['foto']['tmp_name'];

// Obtener la foto anterior del formulario
$foto_anterior = $_REQUEST['foto2'];


// Verificar si se ha seleccionado una nueva foto
if (!empty($foto)) {
	// Se ha seleccionado una nueva foto, guardarla y actualizar la variable $foto
	$fotuser = "../imagenes/fotosperfil/cliente/" . $foto;
	copy($ruta, $fotuser);
} else {
	// No se ha seleccionado una nueva foto, utilizar la foto anterior
	$foto = $foto_anterior;
}


actualizarDatosCliente($idCliente, $nombres, $apellidos, $telefono, $direccion, $dni, $foto, $conn);
header('Location: ../pages/Cliente/clienteIndex/cliente.php');
?>