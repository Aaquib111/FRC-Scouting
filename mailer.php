<?php

require_once('mailer/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'stmp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username= 'frcsnoreply@gmail.com';
$mail->Password = 'team810@noreply'
//$mail->SetFrom('norep')
//$mail->
//$mail->

?>