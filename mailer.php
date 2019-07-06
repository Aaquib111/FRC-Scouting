<?php

require_once('mailer/PHPMailer-5.2-stable/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
//$mail->Port = '465';
$mail->isHTML(true);

$mail->Username= 'frcsnoreply@gmail.com';
$mail->Password = 'team810@noreply';
$mail->SetFrom('noreply@frcs.com');

$mail->subject = 'testSubject';
$mail->Body = 'test';
$mail->AddAddress('aaquibahm@gmail.com');

$mail->Send();

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>