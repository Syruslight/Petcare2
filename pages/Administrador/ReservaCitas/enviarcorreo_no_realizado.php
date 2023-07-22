<?php
// Cargar la librería PHPMailer
require '../../../libreria/PHPMailer-master/src/PHPMailer.php';
require '../../../libreria/PHPMailer-master/src/SMTP.php';
require '../../../libreria/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Obtener los datos del formulario AJAX
$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$fechaCita = $_POST['citaHora'];
$nombreServicio = $_POST['nombreServicio'];

$tuCorreo = 'anon.utp@gmail.com';  // Reemplaza con tu dirección de correo
$tuPassword = 'ltbahbhvxcpbctzw';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Reemplaza con la dirección del servidor SMTP
$mail->SMTPAuth = true;
$mail->Username = $tuCorreo;
$mail->Password = $tuPassword;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->setFrom($tuCorreo, 'Hola cliente');
$mail->addAddress($correo);
$mail->Subject = 'Reserva de cita - PetCare';

// Formato del cuerpo del correo con HTML y estilos básicos
$mail->isHTML(true);
$mail->Body = '<html>
<head>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  .titulo {
    font-size: 20px;
    font-weight: bold;
  }
  .texto {
    font-size: 16px;
  }
  .destacado {
    font-weight: bold;
    color: #FF0000;
  }
</style>
</head>
<body>
  <p class="titulo">Estimado ' . $nombre . ',</p>
  <p class="texto">Lamentablemente, debemos informarte que tu cita del servicio <span class="destacado">' . $nombreServicio . '</span> con fecha <span class="destacado">' . $fechaCita . '</span> no ha sido confirmada.</p>
  <p class="texto">Por favor, ponte en contacto con nosotros para más información y para poder resolver cualquier inconveniente que haya surgido. Número de referencia: <span class="destacado">984561237</span></p>
  <p class="texto">Te pedimos disculpas por los inconvenientes que esto pueda ocasionarte y esperamos poder atenderte en otra ocasión.</p>
  <p class="texto">Atentamente,</p>
  <p class="texto">El equipo de PetCare</p>
</body>
</html>';

if ($mail->send()) {
    echo 'Correo de "No Realizado" enviado correctamente';
} else {
    echo 'Correo de "No Realizado" enviado correctamente';
}
?>
