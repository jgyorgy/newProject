<?php

        function Register() {
            error_reporting(E_ALL); ini_set('display_errors', 'On'); 
            include_once('../templates/header.php');
            
            $username = $_POST['usernameReg'];
            $password = $_POST['passwordReg'];
            $passwordConfirm = $_POST['passwordConfirmReg'];
            $email = $_POST['emailReg'];
            $phone = $_POST['phoneReg'];
            $verificationTermsPW = '/^[a-zA-Z0-9\.,!?]{5,}$/';
            $verificationTermsPhone = '/^[0-9]{10,}$/';
            
            //check if inputs are empty in case that javascript is disabled from browser
            if ($username == "") {
                $_SESSION['error'] = 'You Forgot to type in your username!';
                header("Location:login.php");
                exit;
            }
            if ($password == "") {
                $_SESSION['error'] = 'You Forgot to type in your password!';
                header("Location:login.php");
                exit;
            }
            
            /*get data from database*/
            $user = $Restaurant->checkUser($username);

            $DBusername = $user['username'];
            
            //check if user already exist
            if($user == true){
                $_SESSION['error'] = 'This username already exist!';
                header("Location:login.php");
                exit;
            }
            //check if valid password and both passwords match
            if(preg_match_all($verificationTermsPW , $password) == 0){
                if ($password != $passwordConfirm) {
                    $_SESSION['error'] = 'The password and confirmation password do not match!';
                    header("Location:login.php");
                    exit;
                }
                $_SESSION['error'] = 'Password must contain atleast 10 characters/numbers w/o space!';
                header("Location:login.php");
                exit;
            }
            //check if phone number is in correct format
            if(preg_match_all($verificationTermsPhone , $phone) == 0){
                $_SESSION['error'] = 'There must be atleast 10 numbers!';
                header("Location:login.php");
                exit;
            }
            //check if email is in valid format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'Invalid email: '. $email.'. It should look like "example@ex.com"';
                header("Location:login.php");
                exit;
            }
            //if everything went fine insert the created user into the DB
            $user = $Restaurant->insertUser($username , $password , $email , $phone);
            $_SESSION['error'] = 'User: '. $username.' was succesfully created. Please log in to go further.';
            header("Location:login.php");
            exit;
        }

        if (isset($_POST['submit'])) {
            Register();
        }
        ?>