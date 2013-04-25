<?php session_start(); ?>
<?php
    //load config file
    require_once ('config.php');
    
    //load extra function
    require_once ('functions.php');
    require_once ('xml_ponuda.php');
    
    //load core object
    require_once('database.php');
    require_once('database_object.php');
    
    //load database-related class
    require_once ('korisnici.php');
    require_once ('ponude.php');
    require_once ('racuni.php');
    require_once ('racuni_akcije.php');
    require_once ('kategorije.php');
    require_once ('prodavatelji.php');    
    require_once ('gradovi.php');
    require_once ('gradovi_akcije.php');
    require_once ('akcije.php');    



?>