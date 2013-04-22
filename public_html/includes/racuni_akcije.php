<?php
    class Racuni_akcije extends DatabaseObject { 

        protected static $table_name = "racuni_akcije";
        protected static $db_fields = array('id','id_racuna','id_akcije','kolicina');

       public $id;
       public $id_racuna;
       public $id_akcije;
       public $kolicina;

    } 
?>