<?php
	include_once('../templates/header.php');
?>
<div class="restaurante">
<?php
	$database->query("select ID , Nume , Adresa from restaurante");
	$Restaurante = ($database->resultset());
?>

	Nume: <?php print($Restaurante[0]['Nume']);?>
	Adresa: <?php print($Restaurante[0]['Adresa']);?>
</div>