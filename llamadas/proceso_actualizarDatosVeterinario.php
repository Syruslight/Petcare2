<?php
	require '../controlador/conexion.php';
	$conn =conectar();
	
	$idveterinario= $_REQUEST['idveterinario'];
	$nombres= $_REQUEST['nombres'];
    $apellidos=$_REQUEST['apellidos'];
	$telefono= $_REQUEST['telefono'];
    $dni=$_REQUEST['dni'];
    $direccion=$_REQUEST['direccion'];
    

    $foto = $_FILES['foto']['name'];
	$ruta = $_FILES['foto']['tmp_name'];
	
	if(!empty($foto)) {
		$fotuser = "../imagenes/fotosperfil/veterinario/".$foto;
		copy($ruta, $fotuser);
	}
	actualizarVeterinario($idveterinario, $nombres, $apellidos, $dni, $telefono, $direccion, $foto,$conn);
	header('Location: ../pages/Veterinario/veterinario.php');
?>