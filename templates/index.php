<?php
include_once('../templates/header.php');
?>
	<form action="cautare.php" method="POST">
		<ul id="cautare">
			<li class="cautare1">
				<label for="zona">Zona</label>
			</li>
			<li class="cautare2">
				<label for="persoane">Nr. persoane</label>
			</li>
			<li class="cautare3">
				<label for="data">Data</label>
			</li>
			<li class="cautare4">
				<label for="ora">Ora</label>
			</li>
			<li class="cautare1 selectBox-options">
				<select name="zona" id="zona" tabindex="1">	
					<option value="">Zona</option>
					<option value="Canada">Canada</option>
					<option value="France">France</option>
					<option value="Spain">Spain</option>
					<option value="Bulgaria">Bulgaria</option>
					<option value="Italy">Italy</option>
					<option value="Japan">Japan</option>
					<option value="China">China</option>
				</select>
			</li>
			<li class="cautare2 selectBox-options">
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
				<input id="datepicker">
			</li>
		</ul>
		<input type="submit" value="Cauta">
	</form>
		
	</body>
</html>
