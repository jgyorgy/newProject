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


if(isset($restaurant) && ($restaurant != '')) {
    $meseLibere = $Restaurant->restaurantHasFreeTables($restaurant, $masa, $newformat);
    if ($meseLibere) {
        //$insertRezervation = $Restaurant->insertRezervation($restaurant, $masa, $savedDate);
        echo 'Masa e libera<br />';
        print_r($restaurant);
        echo '<br />';
        print_r($Restaurante);
        ?>
        <ul class="restauranteCautare">
            <li>
                <div class='pozaRestaurantCautare'>
                    <img src='../images/logos/logo.jpg'>
                </div>
                <div class="restaurantDescriere">
                    <div class='numeRestaurantCautare'>
                        <h2><?php print($Restaurante[$restaurant - 1]['Nume']);?></h2>
                    </div>
                    <div class='adresaRestaurantCautare'>
                        Adresa: <?php print($Restaurante[$restaurant - 1]['Adresa']);?>
                    </div>
                    <div class='descriereRestaurantCautare'>
                        Facilitati: <?php print($Restaurante[$restaurant - 1]['Descriere']);?>
                    </div>
                </div>
                </li>
        </ul>
<?php
    } else {
        echo 'stay home';
    }
}
else{
    $meseLibere = $Restaurant->allRestaurantHasFreeTables($masa, $newformat);

    $items = array();
    for($i=0; $i<count($meseLibere); $i++){
        $items[] = $meseLibere[$i]['Restaurant_ID'];
    }
    
    $items2 = array();
    for($i=0; $i<count($Restaurante); $i++){
        $items2[] = $Restaurante[$i]['ID'];
    }    
    
    $result = array_diff($items2, $items);
    
    foreach ($result as $value) {
?>
        <ul class="restauranteCautare">
            <li>
                <div class='pozaRestaurantCautare'>
                    <img src='../images/logos/logo.jpg'>
                </div>
                <div class="restaurantDescriere">
                    <div class='numeRestaurantCautare'>
                        <h2><?php print($Restaurante[$value-1]['Nume']);?></h2>
                    </div>
                    <div class='adresaRestaurantCautare'>
                        Adresa: <?php print($Restaurante[$value-1]['Adresa']);?>
                    </div>
                    <div class='descriereRestaurantCautare'>
                        Facilitati: <?php print($Restaurante[$value-1]['Descriere']);?>
                    </div>
                </div>
                </li>
        </ul>
<?php
    }
}
?>
