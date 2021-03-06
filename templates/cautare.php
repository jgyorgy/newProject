<?php

include_once('../templates/header.php');

$restaurant = htmlspecialchars($_POST['restaurant']);
$masa = htmlspecialchars($_POST['nr_persoane']);
$data = htmlspecialchars($_POST['dataCheck']);
$ora = htmlspecialchars($_POST['oraCheck']);

$time = strtotime($data . ' ' . $ora);

$newformat = date('Y-m-d  H:i:s', $time);
$newformat = new DateTime($newformat);

$savedDate = date('Y-m-d  H:i:s', $time);

?>
<script>
    //var postData = "<?php /*echo $restaurant;*/ ?>";
    var postData2 = "<?php echo $masa; ?>";
    var postData3 = "<?php echo $savedDate; ?>";
    $( document ).ready(function() {
        
    $('.rezerva').click(function(e){
        var postData = $(this).parent().parent().find('.idRestaurantCautare').val();
        //console.log(postData);
        e.preventDefault();
        $.ajax({
                url: 'ajaxCalls.php?action=rezerva',
                method: "POST",
                data: {'restaurant': postData, 'masa': postData2 , 'data': postData3}, 
                dataType: "json",
                success: function () {
                    $('.restauranteCautare').css('display','none');
                    $('.confirmare').css('display','block');
                    //alert('success');
                    
                },
                error: function () {
                    $('.restauranteCautare').css('display','none');
                    $('.confirmare_fail').css('display','block');
                    //alert('not');
                }
            });
    });
});
</script>
<?php
//var_dump($Restaurante);
if(isset($restaurant) && ($restaurant != '')) {
    $meseLibere = $Restaurant->restaurantHasFreeTables($restaurant, $masa, $newformat);
    if ($meseLibere) {
        ?>
        <ul class="restauranteCautare">
            <li>
                <div class='pozaRestaurantCautare'>
                    <img src='../images/logos/logo.jpg'>
                </div>
                <div class="restaurantDescriere">
                    <input type="hidden" class="idRestaurantCautare" name="idRestaurantCautare" value="<?php print($Restaurante[$restaurant - 1]['ID']);?>" />
                    <div class='numeRestaurantCautare'>
                        <h2><?php print($Restaurante[$restaurant - 1]['Nume']);?></h2>
                    </div>
                    <div class='adresaRestaurantCautare'>
                        <b>Adresa:</b> <?php print($Restaurante[$restaurant - 1]['Adresa']);?>
                    </div>
                    <div class='descriereRestaurantCautare'>
                        <b>Descriere:</b> <?php print($Restaurante[$restaurant - 1]['Descriere']);?>
                    </div>
                    <div class="rezervaMasa">
                        <a class="rezerva" title="Rezerva" name="Rezerva" type="submit">Rezerva</a>
                    </div>
                </div>
            </li>
        </ul>
        <div class="confirmare">Rezervarea a fost preluata. Verifica adresa de mail!</div>
        <div class="confirmare_fail">Rezervarea nu a fost preluata. Te rugam sa incerci din nou!</div>
<?php
    } else {
?>        
    <div class="toateOcupate">Restaurantul nu mai are mese disponibile la aceasta ora.</div>
<?php  
    }
}
else{
    $meseLibere = $Restaurant->allRestaurantHasFreeTables($masa, $newformat);

    $items = array();
    for($i=0; $i<count($meseLibere); $i++){
        $items[] = $meseLibere[$i]['Restaurant_ID'];
    }
    
    $items2 = array();
    for($i=0; $i<count($Restaurante); $i++){
        $items2[] = $Restaurante[$i]['ID'];
    }    
    
    $result = array_diff($items2, $items);
    
    foreach ($result as $value) {
?>
        <ul class="restauranteCautare">
            <li>
                <div class='pozaRestaurantCautare'>
                    <img src='../images/logos/logo.jpg'>
                </div>
                <div class="restaurantDescriere">
                    <input type="hidden" class="idRestaurantCautare" name="idRestaurantCautare" value="<?php print($Restaurante[$value-1]['ID']);?>" />
                    <div class='numeRestaurantCautare'>
                        <h2><?php print($Restaurante[$value-1]['Nume']);?></h2>
                    </div>
                    <div class='adresaRestaurantCautare'>
                        <b>Adresa:</b> <?php print($Restaurante[$value-1]['Adresa']);?>
                    </div>
                    <div class="space"></div>
                    <div class='descriereRestaurantCautare'>
                        <b>Descriere:</b> <?php print($Restaurante[$value-1]['Descriere']);?>
                    </div>
                    <div class="rezervaMasa">
                        <a class="rezerva" title="Rezerva" name="Rezerva" type="submit">Rezerva</a>
                    </div>
                </div>
                </li>
        </ul>
        
<?php
    }
?>
    <div class="confirmare">Rezervarea a fost preluata. Verifica adresa de mail!</div>
    <div class="confirmare_fail">Rezervarea nu a fost preluata. Te rugam sa incerci din nou!</div>
<?php }
?>
