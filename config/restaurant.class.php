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

}