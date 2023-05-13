<?php
	require '../controlador/conexion.php';
	$conn =conectar();

    #Parametros
	$nombre = $_REQUEST['nombre'];
    $contra = $_REQUEST['contraseña'];
    $correo = $_REQUEST['correo'];
    #El estado por defecto siempre sera usuario, porque la cuenta del administrador y veterinario lo crea el dba
    $estado= 'user';
    agregarUsuario($nombre, $contra, $correo, $estado, $conn);
    #La linea 12 se debe modificar para que muestre un mensaje de aceptacion, puede ir en el back de la pagina : "registro.php"
    echo('<script>alert("Registrado Correctamente"); window.history.back()</script>');
	header('Location: ../paginas/login/login.php');
?>
