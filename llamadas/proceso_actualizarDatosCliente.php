<?php
	require '../controlador/conexion.php';
	$conn =conectar();
	
	$idCliente= $_REQUEST['idcliente'];
	$nombres= $_REQUEST['nombres'];
    $apellidos=$_REQUEST['apellidos'];
	$telefono= $_REQUEST['telefono'];
    $dni=$_REQUEST['dni'];
    $direccion=$_REQUEST['direccion'];
    

    $foto = $_FILES['foto']['name'];
	$ruta = $_FILES['foto']['tmp_name'];
	
	if(!empty($foto)) {
		$fotuser = "../imagenes/fotosperfil/cliente/".$foto;
		copy($ruta, $fotuser);
	}
	actualizarDatosCliente($idCliente,$nombres,$apellidos,$telefono,$direccion,$dni,$foto,$conn);
	header('Location: ../pages/Cliente/cliente.php');
?>