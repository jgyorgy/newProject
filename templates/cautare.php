<?php

include_once('../templates/header.php');

$restaurant = htmlspecialchars($_POST['restaurant']);
$masa = htmlspecialchars($_POST['nr_persoane']);
$data = htmlspecialchars($_POST['dataCheck']);
$ora = htmlspecialchars($_POST['oraCheck']);

$time = strtotime($data . ' ' . $ora);

$newformat = date('Y-m-d  H:i:s', $time);
$newformat = new DateTime($newformat);

$savedDate = date('Y-m-d  H:i:s', $time);
$savedDate = new DateTime($savedDate);

$meseLibere = $Restaurant->restaurantHasFreeTables($restaurant, $masa, $newformat);



    if ($meseLibere) {
        $insertRezervation = $Restaurant->insertRezervation($restaurant, $masa, $savedDate);
        echo 'sunt mese libere';
    
    } else {
        echo 'stay home';
    }
?>
