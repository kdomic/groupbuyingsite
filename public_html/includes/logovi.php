<?php
    require_once('initialize.php');
    
    class Logovi extends DatabaseObject {
        protected static $table_name = "logovi";
        protected static $db_fields = array('id',
                                            'id_korisnika',
                                            'id_tip','kljuc','datum');
            public $id;         //[0]
            public $id_korisnika;   //[1]
            public $id_tip;  //[2]
            public $kljuc;  //[3]
            public $datum;  //[4]

        public static function logoviOp($tip, $kljuc){
        	$l = new Logovi();
        	$l->id_korisnika = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
        	$l->id_tip = $tip;
        	$l->kljuc = $kljuc;
        	$l->datum = date("Y-m-d H:i:s");
        	$l->save();
        }

    }
?>