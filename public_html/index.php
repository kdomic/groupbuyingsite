<?php require_once ('includes/initialize.php'); ?>

<?php
    $korisnici = Korisnici::find_all();
    echo '<pre>';
    print_r($korisnici);
    echo '</pre>';   
?>