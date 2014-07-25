<?php
	include_once('../templates/header.php');

	

	for($i=0; $i<count($Restaurante); $i++){
?>
<div class="restaurante">
	Nume: <?php print($Restaurante[$i]['Nume']);?>
	Adresa: <?php print($Restaurante[$i]['Adresa']);?>
</div>
<?php } ?>