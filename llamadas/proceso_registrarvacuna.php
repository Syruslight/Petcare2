<?php
    require '../controlador/conexion.php';
	$conn =conectar();

   
    $lote = $_REQUEST['lote'];
    $tipo = $_REQUEST['tipo'];
    $descripcion =$_REQUEST['descripcion'];
    $estadoLote = $_REQUEST['opcionesLotes'];
    
    if ($_REQUEST['opcionesLotes'] == 'Activado') {
        $estadoLote =1;

    } elseif ($_REQUEST['opcionesLotes'] == 'Desactivado') {
        $estadoLote =0;
    }
    
    
    agregarDatosLote($lote,$tipo,$descripcion,$estadoLote,$conn);
    
    header('Location: ../pages/Veterinario/vacunas/moduloLote.php');
// Después de insertar correctamente el dato en la base de datos

?>
