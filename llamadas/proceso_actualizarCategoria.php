<?php
require '../controlador/conexion.php';
$conn = conectar();

$idtipoproductoservicio = $_REQUEST['idCategoriaEnvio'];
$nombre = $_REQUEST['idNombreCategoriaEnvio'];


//echo $idproductoservicio . " " . $nombre;
editarCategoria($idtipoproductoservicio, $nombre,$conn);
header('Location: ../pages/Administrador/administradorCategory/administradorCategory.php');
?>