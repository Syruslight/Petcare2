<?php
require '../controlador/conexion.php';
$conn = conectar();

$idcliente = $_POST['idCliente'];

$razaSeleccionada = $_POST['raza'];
$razaData = explode('-', $razaSeleccionada);
$idraza = $razaData[0];

$nombre = $_POST['nombreMascota'];
$fechaNac = $_POST['fechaNac'];
$peso = $_POST['peso'];
$color = $_POST['color'];

$sexo=$_POST['sexo'];
$etapa = $_POST['etapa'];
$renian = $_POST['renian'];
$estado = 1;


$esterilizado = "";
if (isset($_POST['esterilizado'])) {
    $esterilizado = $_POST['esterilizado'];
}

$fotoPerfil = "";
if (!empty($_FILES['foto']['name'])) {
    $fotoPerfil = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
}

$fechaActualizada = date('Y-m-d', strtotime(str_replace('-', '/', $fechaNac)));

if (!empty($fotoPerfil)) {
    $rutaDestino = "../imagenes/fotosperfil/mascota/";
    if (!is_dir($rutaDestino)) {
        mkdir($rutaDestino, 0755, true);
    }
    $fotRutaMascota = $rutaDestino . $fotoPerfil;
    move_uploaded_file($ruta, $fotRutaMascota);
}

agregarDatosMascota($idcliente, $idraza, $nombre, $fechaActualizada, $peso, $color, $fotoPerfil, $esterilizado, $etapa, $renian,$sexo, $estado, $conn);

$especie = "Perro";
if($especie == "Perro"){
    $especienuva= evaluarEdadEtapaPerro()
}
evaluarEdadEtapa($fechaActualizad, $esPerro, $esGato, $esConejo);

header('Location: ../pages/Mascota/mascotaIndex.php');
?>
