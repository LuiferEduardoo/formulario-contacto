<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("vendor/autoload.php"); 

function sendMail($subject, $body, $email, $name, $html = false)
{
    // Configuración inicial de nuestro servidor
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    // $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'b352ff93c91013';
    $phpmailer->Password = '00509187cbe1ac';


    // Destinatarios
    $phpmailer->setFrom('website@luifereduardoo.com', 'Website');
    $phpmailer->addAddress('contacto@luifereduardoo.com', $name); 

    // Contenido del email 
    $phpmailer->isHTML($html);                                  
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;

    // Se envia el correo
    $phpmailer->send();
}