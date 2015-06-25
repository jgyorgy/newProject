<?php 
    include_once('../config/config.php');
		
    $rezervari = $Restaurant->rezervari();
    
    print json_encode($rezervari);
    
    
    
    
    
    
    
?>