<?php
	require '../controlador/conexion.php';
	$conn =conectar();
	
	$idadministrador= $_REQUEST['idadministrador'];
	$nombres= $_REQUEST['nombres'];
    $apellidos=$_REQUEST['apellidos'];
	$telefono= $_REQUEST['telefono'];
    $dni=$_REQUEST['dni'];
    $direccion=$_REQUEST['direccion'];
    

    $foto = $_FILES['foto']['name'];
	$ruta = $_FILES['foto']['tmp_name'];
	
	if(!empty($foto)) {
		$fotuser = "../imagenes/fotosperfil/administrador/".$foto;
		copy($ruta, $fotuser);
	}
	actualizarDatosAdministrador($idadministrador, $nombres, $apellidos, $telefono, $direccion, $dni,$foto, $conn);
	header('Location: ../pages/Administrador/administradorIndex/administrador.php');
?>