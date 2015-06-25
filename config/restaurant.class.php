<?php

class Restaurant {

    private $Database;

    public function __construct($database) {
        $this->Database = $database;
    }

    public function restaurantDetails() {
        $this->Database->query("select ID , Nume , Adresa , Descriere from restaurante");
        return ($this->Database->resultset());
    }

    public function insertRezervation($restaurant, $masa, $savedDate , $username_save) {
        $savedDate = $savedDate->add(new DateInterval('PT2H'));
        $this->Database->query("INSERT INTO mese_disponibile(Restaurant_ID, Mese_ID, data, user) VALUES (:restaurant, :masa, :savedDate, :username_save)");

        $this->Database->bind(':restaurant', $restaurant, PDO::PARAM_STR);
        $this->Database->bind(':masa', $masa, PDO::PARAM_STR);
        $this->Database->bind(':savedDate', $savedDate->format("Y-m-d H:i:s"), PDO::PARAM_STR);
        $this->Database->bind(':username_save', $username_save, PDO::PARAM_STR);

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

        $query = "SELECT count(id) FROM mese_disponibile where Restaurant_ID = :restaurant and Mese_ID = :masa and data >= :olddata and  data <= :newdata;";
        $this->Database->query($query);
        $this->Database->bind(':restaurant', $restaurant, PDO::PARAM_STR);
        $this->Database->bind(':masa', $masa, PDO::PARAM_STR);
        $this->Database->bind(':olddata', $oldDate->format("Y-m-d H:i:s"), PDO::PARAM_STR);
        $this->Database->bind(':newdata', $newDate->format("Y-m-d H:i:s"), PDO::PARAM_STR);
        $ocupated = $this->Database->fetchColumn();
        return (($totalTablesNumber - $ocupated) > 0);   
    
    }

    public function allRestaurantHasFreeTables($masa, $data) {
        $oldDate = clone $data;
        $newDate = $data->add(new DateInterval('PT2H'));

        $query = "SELECT count( d.id ) AS nr_mese_ocupate, d.Restaurant_ID, m.mese_totale
                   FROM mese_disponibile AS d
                   LEFT JOIN nr_mese AS m ON ( m.Mese_ID = d.Mese_ID
                   AND d.Restaurant_ID = m.Restaurant_ID )
                   WHERE d.Mese_ID = :masa
                   AND d.data >= :olddata
                   AND d.data <= :newdata
                   GROUP BY d.Restaurant_ID
                   HAVING m.mese_totale <= nr_mese_ocupate";


        $this->Database->query($query);
        $this->Database->bind(':masa', $masa, PDO::PARAM_STR);
        $this->Database->bind(':olddata', $oldDate->format("Y-m-d H:i:s"), PDO::PARAM_STR);
        $this->Database->bind(':newdata', $newDate->format("Y-m-d H:i:s"), PDO::PARAM_STR);
        try {
            $ocupated2 = $this->Database->resultset();
            return($ocupated2);
        } catch(\Exception $ex){
            var_dump($ex);die('aici');
        }
    }
    
    public function checkUser($username){
        
            $query = "SELECT * FROM user WHERE username= :name ";
            $this->Database->query($query);
            $this->Database->bind(':name', $username, PDO::PARAM_STR);
            $user = $this->Database->single();
            return $user;
    }
    
    public function insertUser($username , $password , $email , $phone){
        
            $this->Database->query("INSERT INTO user(username, email, password, phone) VALUES (:username, :email, :password, :phone)");

            $this->Database->bind(':username', $username, PDO::PARAM_STR);
            $this->Database->bind(':email', $email, PDO::PARAM_STR);
            $this->Database->bind(':password', $password, PDO::PARAM_STR);
            $this->Database->bind(':phone', $phone, PDO::PARAM_STR);

            $this->Database->execute();
    }
    
    public function rezervari(){
        
            $query = "SELECT * FROM mese_disponibile ";
            $this->Database->query($query);
            $rezervari = $this->Database->resultset();
            return $rezervari;
    }
}
