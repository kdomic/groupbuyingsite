<?php
    require_once('initialize.php');
    
    class Newsletter extends DatabaseObject {
        protected static $table_name = "newsletter";
        protected static $db_fields = array('id','id_korisnika','email','kategorija','aktivan');
            public $id;         	//[0]
            public $id_korisnika;	//[1]
            public $email;   	    //[2]
            public $kategorija;    	//[3]
            public $aktivan;        //[4]

        public static function set($data) {
			$n = new Newsletter();
			if((int)$data[0]===4) $n = self::find_by_id($data[1]);
            $n->aktivan = array_pop($data);
            $n->kategorija = array_pop($data);
            $n->email = array_pop($data);
            $n->id_korisnika = array_pop($data);
			xmlStatusSend($n->save());
		}

    }
?>