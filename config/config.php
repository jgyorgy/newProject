<?php
session_start();
include_once('database.class.php');
include_once('restaurant.class.php');

define("DB_HOST", "localhost");
define("DB_USER", "jozsi");
define("DB_PASS", "");
define("DB_NAME", "rezervare");

/*url based*/
$allURL =rawurldecode($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$endURL = end((explode('/', $allURL)));
       
if(empty($_SESSION['username'] )&&(($endURL != 'login.php') && ($endURL != 'loginVerification.php') && ($endURL != 'registerVerification.php'))) {
    $_SESSION['error'] = 'Please login first!';
    header('Location:login.php');
    exit();
}

$database = new Database();
$Restaurant = new Restaurant($database);

$Restaurante = $Restaurant->restaurantDetails();

?>
