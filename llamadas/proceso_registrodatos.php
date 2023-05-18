<?php
	require '../controlador/conexion.php';
	$conn =conectar();

	
	$idusuario = $_REQUEST['idUsuario']; //Se obtiene del registroUsuario en index.php
    $tipoUsuario = $_REQUEST['tipoUsuario']; // Según esto se hace el

    $nombres = $_REQUEST['nombres'];
	$apellidos = $_REQUEST['apellidos'];
	$dni = $_REQUEST['dni'];
	$telefono = $_REQUEST['telefono'];
	$direccion = $_REQUEST['direccion'];
	$foto = $_FILES['foto']['name'];
	$ruta = $_FILES['foto']['tmp_name'];
	$sexo = $_REQUEST['sexo'];
	$fechaNac = $_REQUEST['fechaNac'];
	$estado = 1; //Cuenta Activada
    $fotuser = "";
	if(!empty($foto)) {
		$fotuser = "../imagenes/fotosperfil/administrador/".$foto;
		copy($ruta, $fotuser);
	}
	else {
		if($sexo =="Masculino"){
			$foto= "perfil2.png";
		}
		else if ($sexo=="Femenino"){
			$foto= "perfil.png";
		}
	}


	//Cambio de fecha: 
		$fechaBD = date('Y-m-d', strtotime(str_replace('-', '/', $fechaNac)));
	if($tipoUsuario=="Admin"){
		agregarDatosAdministrador($idusuario,$nombres,$apellidos,$dni,$telefono,$direccion,$foto,$sexo,$fechaBD,$estado,$conn);
		header("location:../pages/Administrador/administradorIndex/administrador.php");
	}
	else if ($tipoUsuario=="Cliente"){
		agregarDatosCliente($idusuario,$nombres,$apellidos,$dni,$telefono,$direccion,$foto,$sexo,$fechaBD,$estado,$conn);
		header("location:../pages/Cliente/cliente.php");
	}
	else if($tipoUsuario=="Veterinario"){
		agregarDatosVeterinario($idusuario,$nombres,$apellidos,$dni,$telefono,$direccion,$foto,$sexo,$fechaBD,$estado,$conn);
		//Aqui va la ruta de registro datos a veterinario  
	}


	//Despues de agregar los datos se actualiza el id del usuario:    
    $estadonuevo= 2;
    actualizarEstadoCliente($idusuario,$estadonuevo,$conn);
?>