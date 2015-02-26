<?php
	include_once('../templates/header.php');
        
        $restaurant = htmlspecialchars($_POST['restaurant']);
        $persoane  = htmlspecialchars($_POST['nr_persoane']);
        $data  = htmlspecialchars($_POST['dataCheck']);
        $ora  = htmlspecialchars($_POST['oraCheck']);

        echo  'restaurant: '.$restaurant.'<br />';
        echo  'nr persoane: '.$persoane.'<br />';
        echo  'data: '.$data.'<br />';
        echo  'ora: '.$ora.'<br />';
        
        $time = strtotime($data);

        $newformat = date('Y-m-d',$time);

        echo $newformat;
        
        $Restaurant->insertRezervation($restaurant , $persoane , $data , $ora);
        
?>
