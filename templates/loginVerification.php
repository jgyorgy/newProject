<?php

        function LogIn() {
            error_reporting(E_ALL); ini_set('display_errors', 'On'); 
            include_once('../templates/header.php');
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            
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
            $DBpassword = $user['password'];
            //check if user and password are correct
            if($user == false){
                $_SESSION['error'] = 'Username is wrong!';
                header("Location:login.php");
                exit;
            }
            if ($password != $DBpassword) {
                $_SESSION['error'] = 'Password is wrong!';
                header("Location:login.php");
                exit;
            }
            
            $_SESSION['username'] = $username;
            header("Location:index.php");
            exit;
            
        }

        if (isset($_POST['submit'])) {
            LogIn();
        }
        ?>