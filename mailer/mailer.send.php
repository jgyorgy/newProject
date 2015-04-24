<?php

require './PHPMailerAutoload.php';
session_start();

//require './mailer.setup.php.php';

function SendMail($sendto, $subject, $body_message) {

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'csizmas.szilard@gmail.com';
    $mail->Password = 'egyszerupassword';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->From = 'csizmas.szilard@gmail.com';
    $mail->FromName = 'test';
    $mail->addAddress($sendto, 'test1');
    $mail->addReplyTo('csizmas.szilard@gmail.com', 'test2');
    $mail->WordWrap = 50;
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body_message;

    return $mail->send();
}

function DialogForm() {

    $name = $_POST['InputName'];
    $company = $_POST['InputCompany'];
    $email = $_POST['InputEmail1'];
    $comment = $_POST['InputComment'];

    $_POST['InputName']="";
    $_POST['InputCompany']=""; 
    
    $_SESSION['InputName'] = $name;
    $_SESSION['InputCompany'] = $company;
    $_SESSION['InputEmail1'] = $email;
    $_SESSION['InputEmail2'] = $_POST['InputEmail2'];
    $_SESSION['InputComment'] = $comment;

    $body_message = 'From: ' . $name . "\n";
    $body_message = 'Company: ' . $company . "\n";
    $body_message .= 'E-mail: ' . $email . "\n";
    $body_message .= 'Message: ' . $comment;

    $subject = 'Message from: ' . $name;
    $sendto = "csizmas_szilard@yahoo.com";


    if (!SendMail($sendto, $subject, $body_message)) {
        
        $_SESSION['msg'] = "Message could not be sent to 1";
        $_SESSION['gotMsg'] = 'Yes';
        print(json_encode($_SESSION));
        // header('Location: http://localhost/ctrl3d/index.php');
        // exit;
        //return false;
    } else {
       
        if (!SendMail($email, "Re:", "Mail sent")) {
            $_SESSION['msg'] = "Message could not be sent to 2";
            $_SESSION['gotMsg'] = 'Yes';
            print(json_encode($_SESSION));
            //    header('Location: http://localhost/ctrl3d/index.php');
            //    exit;
            //return false;
        } else {
            $_SESSION['msg'] ="Message sent";
            print(json_encode($_SESSION));
            //$_SESSION['gotMsg']="Yes";
            //header('Location: http://localhost/ctrl3d/index.php?destroy=true');
            //exit;
            //return true;
        }
    }
}

//if (isset($_POST['submit'])) {
DialogForm();
//}
?>

