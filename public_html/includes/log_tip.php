<?php
    class Log_tip extends DatabaseObject { 

        protected static $table_name = "log_tip";
        protected static $db_fields = array('id','opis');

       public $id;
       public $opis;

    } 
?>