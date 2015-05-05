<?php

require '../mailer/PHPMailerAutoload.php';
session_start();
//print_r($_POST);die;
//require './mailer.setup.php.php';

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
//var_dump($_POST);die;
    $nameUser = $_SESSION['username'];
    $email = $_SESSION['email'];

    $body_message = 'Buna ziua: ' . $nameUser . "<br />";
    $body_message .= 'Aceasta e un mesaj de confirmare pentru ocuparea mesei la... ';

    $subject = 'Message from: rezervatimasa';
    $sendto = $email;

    SendMail($sendto, $subject, $body_message);
    SendMail('rezervatimasa@gmail.com', "Re:", "Mail sent to: ".$nameUser);

//    if (!SendMail($sendto, $subject, $body_message)) {
//        
//        $_SESSION['msg'] = "Message could not be sent to 1";
//        $_SESSION['gotMsg'] = 'Yes';
//        print(json_encode($_SESSION));
//        // header('Location: http://localhost/ctrl3d/index.php');
//        // exit;
//        //return false;
//    } else {
//       
//        if (!SendMail('rezervatimasa@gmail.com', "Re:", "Mail sent to: ".$nameUser)) {
//            $_SESSION['msg'] = "Message could not be sent to 2";
//            $_SESSION['gotMsg'] = 'Yes';
//            print(json_encode($_SESSION));
//            //    header('Location: http://localhost/ctrl3d/index.php');
//            //    exit;
//            //return false;
//        } else {
//            $_SESSION['msg'] ="Message sent";
//            print(json_encode($_SESSION));
//            //$_SESSION['gotMsg']="Yes";
//            //header('Location: http://localhost/ctrl3d/index.php?destroy=true');
//            //exit;
//            //return true;
//        }
//    }
}

DialogForm();

?>

