<?php

class Restaurant{
	
	private $Database;

	public function __construct($database){
		$this -> Database = $database; 
	}

	public function restaurantDetails(){
		$this->Database->query("select ID , Nume , Adresa from restaurante");
		return ($this->Database->resultset());
	}

	public function meseDisponibile(){
		$query = "SELECT r.ID, m.mese_totale, m.mese_disponibile
				FROM restaurante AS r
				LEFT JOIN nr_mese ON nr_mese.Restaurant_ID = r.ID
				LEFT JOIN nr_mese AS m ON m.ID = nr_mese.Mese_ID;"
		$this->Database->query($query);
		return ($this->Database->resultset());
	}
}