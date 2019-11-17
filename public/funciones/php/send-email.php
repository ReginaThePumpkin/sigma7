<?php
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->Host = "smtp.gmail.com";
$mail->IsHTML(true);

$mail->SMTPAuth = true;
$mail->Username = "eanzuresb@gmail.com";
$mail->Password = "garbage3.0";

//Sender Info
$mail->From = "eanzuresb@gmail.com";
$mail->FromName = "ADMINISTRACION SISTEMA";
