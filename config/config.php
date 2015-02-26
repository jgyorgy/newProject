<?php 
	//phpinfo();exit();
	include_once('database.class.php');
	include_once('restaurant.class.php');

	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "admin");
	define("DB_NAME", "rezervare");

	$database = new Database();
	$Restaurant = new Restaurant($database);
	
	$Restaurante = $Restaurant->restaurantDetails();
        
?>