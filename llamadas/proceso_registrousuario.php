<?php
    require '../controlador/conexion.php';
	$conn =conectar();

    #Parametros
	$idTipoUsuario = '1' ; //Por defecto se le asigna el tipo de usuario: Cliente
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    #El estado por defecto siempre sera 1 porque la cuenta se activa al crearse
    $estado= '1';
    

    agregarCliente($idTipoUsuario, $email, $pass,$estado, $conn);
    
     //Al logearse se deben obtener dos datos: 
     $datosUsuario= validarUsuario($email,$pass,$conn);
     //1. El tipo de usuario : Administrador, veterinario, cliente
     $tipoUsuario = $datosUsuario['tipoUsuario']; // Según esto se hace el
     //2. El estado del usuario, es decir : 1.Cuenta Desactivada | 2.Cuenta Activada pero sin datos del usuario |3.Cuenta activada con datos
     $estadoUsuario= $datosUsuario['estado'];
     
     session_start();
 
     #ObteneridUsuario
     $idUsuario = obteneridUsuario($email, $pass, $conn);
     $_SESSION['email']=$email;
     $_SESSION['idUsuario'] = $idUsuario;
     $_SESSION['tipoUsuario']= $tipoUsuario;
	header('location:../pages/Usuario/registroNewUs.php');
?>
