<?php
    require '../controlador/conexion.php';
	$conn =conectar();

    $nombre = $_REQUEST['nombreCategoria'];
    $tipoCategoria = $_REQUEST['tCategoria'];
    $idEspecie = $_POST['idEspecie'];
    
    echo $nombre . $tipoCategoria . $idEspecie;
    agregarCategoria($nombre,$idEspecie,$tipoCategoria,$conn);


    header('location:../pages/Administrador/administradorCategory/administradorCategory.php');
?>