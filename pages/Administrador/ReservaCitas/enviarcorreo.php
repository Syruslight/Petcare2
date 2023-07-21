<?php
// Cargar la librería PHPMailer
require '../../../libreria/PHPMailer-master/src/PHPMailer.php';
require '../../../libreria/PHPMailer-master/src/SMTP.php';
require '../../../libreria/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// obtener el correo del formulario AJAX
$correo = $_POST['correo'];
echo $correo;



$tuCorreo = 'anon.utp@gmail.com';  // Reemplaza con tu dirección de correo
$tuPassword = 'ltbahbhvxcpbctzw';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'servidor_smtp'; // Reemplaza con la dirección del servidor SMTP
$mail->SMTPAuth = true;
$mail->Username = $tuCorreo;
$mail->Password = $tuPassword;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->setFrom($tuCorreo, 'Tu Nombre');
$mail->addAddress($correo);
$mail->Subject = 'Asunto del correo';
$mail->Body = 'Contenido del correo...';

if ($mail->send()) {
    echo 'Correo enviado correctamente';
} else {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}

?>