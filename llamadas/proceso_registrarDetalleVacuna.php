<?php
    require '../controlador/conexion.php';
	$conn =conectar();

   
    $idMascota = $_REQUEST['idMascota'];
    $idVacuna = $_REQUEST['idVacuna'];
    $idVeterinario =$_REQUEST['idVeterinario'];
    $fechaProxima = $_REQUEST['fechaProxima'];
    $observacion =$_REQUEST['observacion'];
    $restriciones =$_REQUEST['restriciones'];

    $fechaProximaBD = date('Y-m-d', strtotime(str_replace('-', '/', $fechaProxima)));


    agregarDatosDetalleVacuna($idMascota, $idVacuna, $idVeterinario, $fechaProxima,$observacion, $restriciones,$conn);
    
// Después de insertar correctamente el dato en la base de datos
header('Location: ../pages/Veterinario/vacunas/moduloVacuna.php');

?>
