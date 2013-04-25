<?php
    require_once('initialize.php');
    
    class Gradovi_akcije extends DatabaseObject {
        protected static $table_name = "gradovi_akcije";
        protected static $db_fields = array('id',
                                            'id_grada',
                                            'id_akcije');
            public $id;         //[0]
            public $id_grada;   //[1]
            public $id_akcije;  //[2]


    }
?>