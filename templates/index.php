<?php
include_once('../templates/header.php');
?>
	<form>
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
			<li class="cautare5">
				<label for="persoane">Nr. persoane</label>
			</li>
			<li class="cautare1 selectBox-options">
				<select name="zona" id="zona" tabindex="1">	
					<option value="">Zona</option>
					<option value="9">Canada</option>
					<option value="2">France</option>
					<option value="3">Spain</option>
					<option value="6">Bulgaria</option>
					<option value="8">Italy</option>
					<option value="5">Japan</option>
					<option value="11">China</option>
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
	</form>
		
	</body>
</html>
