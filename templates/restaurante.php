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
            <div class='descriereRestaurantCautare'>
                Adresa: <?php print($Restaurante[$i]['Adresa']);?>
            </div>
        </div>
        </li>
</ul>
<?php } ?>