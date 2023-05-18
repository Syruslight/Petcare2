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
    
	header('location:../pages/Usuario/registroNewUs.php');
?>
