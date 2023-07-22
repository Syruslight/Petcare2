<?php
// Cargar la librería PHPMailer
require '../../../libreria/PHPMailer-master/src/PHPMailer.php';
require '../../../libreria/PHPMailer-master/src/SMTP.php';
require '../../../libreria/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// obtener el correo y el nombre del formulario AJAX
$correo = $_POST['correo'];
$nombre = $_POST['nombre'];

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
$mail->Body = 'Estimado ' . $nombre . ', lamentablemente tu pago no ha sido confirmado para la cita. Por favor, ponte en contacto con nosotros para más información.<br>Contáctanos al 912380129 para resolver cualquier duda que tengas.';

if ($mail->send()) {
    echo 'Correo de "No Realizado" enviado correctamente';
} else {
    echo 'Error al enviar el correo de "No Realizado": ' . $mail->ErrorInfo;
}
?>
