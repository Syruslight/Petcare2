
<?php
	require '../controlador/conexion.php';
	$conn =conectar();

	$idusuario = 1; //Enviando por defecto le usuario 1 , falta ponerlo dinamico
    $nombre = $_REQUEST['nombre'];
    $foto = $_FILES['foto']['name'];
	$ruta = $_FILES['foto']['tmp_name'];

    $fotuser = "";
	if(!empty($foto)) {
		$fotuser = "../imagenes/mascota/".$foto;
		copy($ruta, $fotuser);
	}

    agregarMascota($idusuario, $nombre, $fotuser,$conn);
	
    header('Location: ../paginas/mascota/perfil.php'); //falta ponerle el ? para navegar hacia la mascota creada
?>
<!--Ejmplo para implementar el id-->
<?php
	require '../controlador/conexion.php';
	$conn =conectar();

	session_start();
    $user = $_SESSION['usuario'];
	
	$title= $_REQUEST['title'];
	$text= $_REQUEST['text'];
    	
	header('Location: ../paginas/notas/notas.php');
?>