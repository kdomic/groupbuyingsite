<?php
    class Racuni extends DatabaseObject { 

        protected static $table_name = "racuni";
        protected static $db_fields = array('id','id_korisnika','datum','placeno');

       public $id;
       public $id_korisnika;
       public $datum;
       public $placeno;

    } 
?>