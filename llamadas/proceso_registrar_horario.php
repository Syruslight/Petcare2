<?php
    require '../controlador/conexion.php';
	$conn =conectar();

    #Parametros
    

    $idveterinario = $_POST['idveterinario'];
    $idproductoservicio = $_POST['idproductoservicio'];
    $fecha = $_REQUEST['fechahorario'];
    $horarioinicio = $_REQUEST['horarioinicio'];
    $horariofin = $_REQUEST['horariofin'];
    $estado = 0;
    #El estado por defecto siempre sera 1 porque la cuenta se activa al crearse
    
  
    agregarHorario( $idveterinario, $idproductoservicio, $fecha, $horarioinicio, $horariofin, $estado,$conn);
    header('location:../pages/Veterinario/horario/horario.php');
?>

