<?php
require '../controlador/conexion.php';
$conn = conectar();

$puntosRecompensa = $_POST['puntos_recompensa'];
$idRecompensa = $_POST['id_recompensa'];

//echo $idproductoservicio . " " . $nombre;
actualizarRecompensa($idRecompensa, $puntosRecompensa, $conn);
header('Location: ../pages/Administrador/gestionDePetiPuntos/gestionDePetiPuntos.php');
?>