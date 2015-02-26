<?php
	include_once('../templates/header.php');

	

	for($i=0; $i<count($Restaurante); $i++){
?>
<div class="restaurante">
    <img src="<?php print($Restaurante[$i]['Thumbnail']);?>">
	Nume: <?php print($Restaurante[$i]['Nume']);?><br />
	Adresa: <?php print($Restaurante[$i]['Adresa']);?>
</div>
<?php } ?>