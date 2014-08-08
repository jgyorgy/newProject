<?php
include_once('../templates/header.php');

	
?>
	<form action="cautare.php" method="POST">
		<ul id="cautare">
			<li class="cautare1">
				<label for="restaurant">Zona</label>
				<div class="clearer"></div>
				<select name="restaurant" id="restaurant" tabindex="1">	
					<option value="">Restaurant</option>
					<?php for($i=0; $i<count($Restaurante); $i++){	?>
						<option value="<?php print($Restaurante[$i]['ID']);?>"><?php print($Restaurante[$i]['Nume']);?></option>
					<?php }	?>
				</select>
			</li>
			<li class="cautare2">
				<label for="persoane">Nr. persoane</label>
				<div class="clearer"></div>
				<select name="nr_persoane" id="nr_persoane" tabindex="1">	
					<option value="">Nr. persoane</option>
					<option value="2">2 persoane</option>
					<option value="3">3 persoane</option>
					<option value="4">4 persoane</option>
					<option value="5">5 persoane</option>
					<option value="6">6 persoane</option>
				</select>
			</li>
			<li class="cautare3">
				<label for="data">Data</label>
				<div class="clearer"></div>
				<input id="datepicker" class="dateInput">
			</li>
			<li class="cautare4">
				<label for="ora">Ora</label>
				<div class="clearer"></div>
				<input id="timepicker" class="timeInput">
			</li>
			<li class="butonSubmit">
				<input class="butonCautare" type="submit" value="Cauta">
			</li>
		</ul>
		
	</form>
		
	</body>
</html>
