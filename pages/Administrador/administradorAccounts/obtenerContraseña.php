<?php
// obtener_contrasenia.php
require '../../../controlador/conexion.php';
	$conn =conectar();
// Obtener el ID del usuario enviado por la solicitud Ajax
$idUsuario = $_POST['idUsuario'];

// Realizar la consulta para obtener la contraseña del usuario en base a su ID
$sentencia = "SELECT pass FROM usuario WHERE idusuario = $idUsuario";
$res = mysqli_query($conn, $sentencia);

if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $contrasenia = $row['pass'];
    echo $contrasenia."<img src='../../../imagenes/paswordIcono.png' width='30px' height='30px' >";
} else {
    echo 'Contraseña no encontrada.';
}
?>
