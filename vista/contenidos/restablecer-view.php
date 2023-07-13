<?php
// Varios destinatarios
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Requerir los servicios de correo
require 'core/Exception.php';
require 'core/PHPMailer.php';
require 'core/SMTP.php';

// habilidar un correo
$mail = new PHPMailer(true);

// Rango del código aleatorio, entra el mil, a 10mil
$codigo= rand(1000,9999);
?>
<!-- Llamar el controlador, enviando a la funcion restablecer, el mail, y el código -->
<form method="POST" autocomplete="off">
    <?php
        require_once "controlador/C_restablecer.php";
        $restablecer = new C_restablecer();
        $restablecer ->restablecer($mail, $codigo);
    ?>
</form>

