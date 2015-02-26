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
		$query = "SELECT r.ID FROM restaurante AS r;";
		$this->Database->query($query);
		return ($this->Database->resultset());
	}
        
        public function insertRezervation($restaurant,$persoane,$data,$ora){
            
            $this->Database->query("INSERT INTO mese_disponibile(Restaurant_ID,
            Mese_ID,
            data,
            ora) VALUES (
            :restaurant,
            :persoane,
            :data,
            :ora)");
            
            $this->Database->bind(':restaurant', $restaurant, PDO::PARAM_STR);      
            $this->Database->bind(':persoane', $persoane, PDO::PARAM_STR);
            $this->Database->bind(':data', $data, PDO::PARAM_STR);
            $this->Database->bind(':ora', $ora, PDO::PARAM_STR);
            
            $this->Database->execute();
            echo ('insert succeeded');                                  
            
        }
}