<?php

require '../mailer/PHPMailerAutoload.php';
session_start();

function SendMail($sendto, $subject, $body_message) {

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'rezervatimasa@gmail.com';
    $mail->Password = 'masarezervare';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->From = 'rezervatimasa@gmail.com';
    $mail->FromName = 'rezervatimasa';
    $mail->addAddress($sendto, 'test1');
    $mail->addReplyTo('rezervatimasa@gmail.com', 'test2');
    $mail->WordWrap = 50;
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body_message;

    return $mail->send();
}

function DialogForm() {

    $nameUser = $_SESSION['username'];
    $email = $_SESSION['email'];

    $body_message = 'Buna ziua: ' . $nameUser . "<br />";
    $body_message .= 'Aceasta e un mesaj de confirmare pentru ocuparea mesei la... ';

    $subject = 'Message from: rezervatimasa';
    $sendto = $email;

    SendMail($sendto, $subject, $body_message);
    SendMail('rezervatimasa@gmail.com', "Re:", "Mail sent to: ".$nameUser);

}

DialogForm();

?>

