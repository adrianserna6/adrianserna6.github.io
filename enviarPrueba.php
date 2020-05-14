<?php

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

$body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Teléfono: " . $telefono . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPOptions = array ('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'elglotonelgloton@gmail.com';           // SMTP username
    $mail->Password   = 'Jilguero_8';                           // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('elglotonelgloton@gmail.com', $nombre);
    $mail->addAddress('elglotonelgloton@gmail.com');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Asunto muy importante!';
    $mail->Body    = $body;

    $mail->send();
    echo '<script>alert("El mensaje se envió correctamente");window.history.go(-1);</script>';
} catch (Exception $e) {
    echo "Hubo un error al mandar el mensaje: {$mail->ErrorInfo}";
}

?>