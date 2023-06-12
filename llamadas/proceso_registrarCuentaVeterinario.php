<?php
require '../controlador/conexion.php';
$conn = conectar();

$email = $_REQUEST['correoNuevo'];
$pass = $_REQUEST['contraseniaNueva'];

$resultado = agregarCuentaVeterinario($email, $pass, $conn);

if ($resultado === true) {
  // La cuenta veterinario se agregó correctamente, redireccionar
  header('Location: ../pages/Administrador/administradorAccounts/administradorAccounts.php');
} else {
  // Hubo un error, mostrar mensaje de error en la página actual
  echo $resultado;
}
?>
