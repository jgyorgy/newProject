<?php

include_once('../config/config.php');

try {
    if ($_GET["action"] == "rezerva") {
        $restaurant = $_POST['restaurant'];
        $masa = $_POST['masa'];
        $savedDate = new DateTime($_POST['data']);
        $username_save = $_SESSION['username'];
        $insertRezervation = $Restaurant->insertRezervation($restaurant, $masa, $savedDate , $username_save);

        $Result = array();
        $Result['success'] = 'success';
        print json_encode($Result);
        require '../mailer/mailer.send.php';
    }
}catch (Exception $ex) {
    //---------------error--------------------
    $Result = array();
    $Result['Result'] = "ERROR";
    print json_encode($Result);
}

?>