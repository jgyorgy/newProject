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

  public function meseDisponibile() {
    $query = "SELECT r.ID FROM restaurante AS r;";
    $this->Database->query($query);
    return ($this->Database->resultset());
  }

  public function insertRezervation($restaurant, $persoane, $data, $ora) {

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

  public function restaurantHasFreeTables($restaurant, $masa, $data) {
    $oldDate = clone $data;
    $newDate = $data->add(new DateInterval('PT2H'));
    $query = "SELECT mese_totale FROM nr_mese where Restaurant_ID = :restaurant and Mese_ID = :masa;";
    $this->Database->query($query);
    $this->Database->bind(':restaurant', $restaurant, PDO::PARAM_STR);
    $this->Database->bind(':masa', $masa, PDO::PARAM_STR);
    $totalTablesNumer = $this->Database->fetchColumn();
    $query = "SELECT count(id) FROM mese_disponibile where Restaurant_ID = :restaurant and Mese_ID = :masa and  data >= :olddata and  data <= :newdata;";
    $this->Database->query($query);
    $this->Database->bind(':restaurant', $restaurant, PDO::PARAM_STR);
    $this->Database->bind(':masa', $masa, PDO::PARAM_STR);
    $this->Database->bind(':olddata', $oldDate->format("Y-m-d H:i:s"), PDO::PARAM_STR);
    $this->Database->bind(':newdata', $newDate->format("Y-m-d H:i:s"), PDO::PARAM_STR);
    $ocupated = $this->Database->fetchColumn();
    return (($totalTablesNumer - $ocupated) > 0);
  }

}
