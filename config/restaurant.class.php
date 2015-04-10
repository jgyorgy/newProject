<?php

class Restaurant {

  private $Database;

  public function __construct($database) {
    $this->Database = $database;
  }

  public function restaurantDetails() {
    $this->Database->query("select ID , Nume , Adresa from restaurante");
    return ($this->Database->resultset());
  }

  public function insertRezervation($restaurant, $masa, $savedDate) {
      
    $this->Database->query("INSERT INTO mese_disponibile(Restaurant_ID, Mese_ID, data) VALUES (:restaurant, :masa, :savedDate)");

    $this->Database->bind(':restaurant', $restaurant, PDO::PARAM_STR);
    $this->Database->bind(':masa', $masa, PDO::PARAM_STR);
    $this->Database->bind(':savedDate', $savedDate->format("Y-m-d H:i:s"), PDO::PARAM_STR);

    $this->Database->execute();
  }

  public function restaurantHasFreeTables($restaurant, $masa, $data) {
    $oldDate = clone $data;
    $newDate = $data->add(new DateInterval('PT2H'));
    $query = "SELECT mese_totale FROM nr_mese where Restaurant_ID = :restaurant and Mese_ID = :masa;";
    $this->Database->query($query);
    $this->Database->bind(':restaurant', $restaurant, PDO::PARAM_STR);
    $this->Database->bind(':masa', $masa, PDO::PARAM_STR);
    $totalTablesNumber = $this->Database->fetchColumn();
    
    $query = "SELECT count(id) FROM mese_disponibile where Restaurant_ID = :restaurant and Mese_ID = :masa and  ADDTIME(data,'2:0:0.000') >= :olddata and  data <= :newdata;";
    $this->Database->query($query);
    $this->Database->bind(':restaurant', $restaurant, PDO::PARAM_STR);
    $this->Database->bind(':masa', $masa, PDO::PARAM_STR);
    $this->Database->bind(':olddata', $oldDate->format("Y-m-d H:i:s"), PDO::PARAM_STR);
    $this->Database->bind(':newdata', $newDate->format("Y-m-d H:i:s"), PDO::PARAM_STR);
    $ocupated = $this->Database->fetchColumn();
    return (($totalTablesNumber - $ocupated) > 0);   
    
  }

}
