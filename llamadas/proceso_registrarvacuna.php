<?php
    require '../controlador/conexion.php';
	$conn =conectar();

   
    $lote = $_REQUEST['lote'];
    $tipo = $_REQUEST['tipo'];
    $descripcion =$_REQUEST['descripcion'];
    
    
    agregarDatosVacuna($lote,$tipo,$descripcion,$conn);
    
    header('Location: ../pages/Veterinario/vacunas/moduloVacunaLote.php');
// Después de insertar correctamente el dato en la base de datos

?>
