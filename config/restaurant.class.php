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
        
       /* public function insertData(){
        
                $query = "INSERT INTO mese_disponibile (restaurant, persoane, data, ora) values (?, ?, ?, ?)";
                $this->Database->query($query);
                $q = $conn->prepare($query) or die("ERROR: " . implode(":", $conn->errorInfo()));

                $q->bindParam(1, $restaurant);
                $q->bindParam(2, $persoane);
                $q->bindParam(3, $data);
                $q->bindParam(4, $ora);

            try {
            $q->execute();
                        echo "<h1> Congratulations, asd! You have been successfully signed up! </h1>";
            }
            catch(PDOException $pe) {
                echo('Connection error, because: ' .$pe->getMessage());
            }
        }*/
        
        public function insertRezervation($restaurant,$persoane,$data,$ora){
            
            $this->Database->query("INSERT INTO mese_disponibile(restaurant,
            persoane,
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
            
            $this->Database->execute(array(':restaurant' => $restaurant, ':persoane' => $persoane, ':data' => $data, ':ora' => $ora));
                                              

        }
}