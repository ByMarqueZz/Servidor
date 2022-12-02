<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';


    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'redbullcaca2@gmail.com';
    $mail->Password = 'vzpjessjrazilgqc';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('redbullcaca2@gmail.com'); // Your email
    $mail->addAddress('lucasmendezbaca@gmail.com'); // Your email
    $mail->isHTML(true);
    $mail->Subject = 'Test';
    // adjunta el archivo
    $mail->addAttachment('archivo.txt');
    $mail->Body = 'Test';
    $mail->send();
?>