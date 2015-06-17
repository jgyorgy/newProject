<?php
	include_once('../templates/header.php');
?>
<div class="listaRestaurante">
    <h1>Lista Restaurante</h1>
</div>	
<?php
	for($i=0; $i<count($Restaurante); $i++){
?>
<ul class="restauranteCautare">
    <li>
        <div class='pozaRestaurantCautare'>
            <img src='../images/logos/logo.jpg'>
            <!--<img src="<?php //print($Restaurante[$i]['Thumbnail']);?>">-->
        </div>
        <div class="restaurantDescriere">
            <div class='numeRestaurantCautare'>
                <h2><?php print($Restaurante[$i]['Nume']);?></h2>
            </div>
            <div class='adresaRestaurantCautare'>
                <b>Adresa:</b> <?php print($Restaurante[$i]['Adresa']);?>
            </div>
            <div class="space"></div>
            <div class='descriereRestaurantCautare'>
                <b>Descriere:</b> <?php print($Restaurante[$i]['Descriere']);?>
            </div>
        </div>
        </li>
</ul>
<?php } ?>