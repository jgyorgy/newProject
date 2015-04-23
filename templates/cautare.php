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
        echo 'Masa a fost ocupata';

        } else {
            echo 'stay home';
        }
}
else{
    $meseLibere = $Restaurant->allRestaurantHasFreeTables($masa, $newformat);
    var_dump($meseLibere);
    echo '<br />';
    echo('crap');
    if ($meseLibere === ''){
        echo('nu este niciun loc liber');
    }else{ 
        var_dump($meseLibere);
        echo('crap2');
        for($i=0; $i<count($Restaurante); $i++){
            var_dump($meseLibere[$i]['Restaurant_ID']);
            echo('<br />');
            if($Restaurante[$i]['Restaurant_ID'] == $meseLibere[$i]['Restaurant_ID']){
        var_dump($meseLibere[$i]['Restaurant_ID']);
        ?>
        <ul class="restauranteCautare">
            <li>
                <div class='pozaRestaurantCautare'>
                    <img src='../images/logos/logo.jpg'>
                </div>
                <div class="restaurantDescriere">
                    <div class='numeRestaurantCautare'>
                        <h2><?php print($Restaurante[$i]['Nume']);?></h2>
                    </div>
                    <div class='adresaRestaurantCautare'>
                        Adresa: <?php print($Restaurante[$i]['Adresa']);?>
                    </div>
                    <div class='descriereRestaurantCautare'>
                        Facilitati: <?php print($Restaurante[$i]['Descriere']);?>
                    </div>
                </div>
                </li>
        </ul>
<?php
            }
        }
    }
}
?>
