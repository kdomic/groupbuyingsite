<?php
    require_once('initialize.php');
    
    class Opomene extends DatabaseObject {
        protected static $table_name = "opomene";
        protected static $db_fields = array('id','id_korisnika','id_moderatora','datum','opis');
            public $id;         	//[0]
            public $id_korisnika;	//[1]
            public $id_moderatora;  //[2]
            public $datum;    	    //[3]
            public $opis;           //[4]

        
        public static function find_by_user($id) {
            return self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id_korisnika=".$id);
        }

        public static function get($id) //2
        {
            $_d = self::find_by_user($id);
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("opomene"));
            foreach ($_d as $d) {
                $data = $root->appendChild($xmlDoc->createElement("opomena"));                
                $data->appendChild($xmlDoc->createElement("id", toUtf8($d->id)));
                $data->appendChild($xmlDoc->createElement("opis", toUtf8($d->opis)));
                $data->appendChild($xmlDoc->createElement("datum", toUtf8(timeForScreenLong($d->datum))));
            }
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }

        public static function set($data) {
			$o = new opomene();
            $o->opis = array_pop($data);
            $o->datum = date("Y-m-d H:i:s");
            $o->id_moderatora = array_pop($data);
            $o->id_korisnika = array_pop($data);
			xmlStatusSend($o->save());
		}

        public static function count($id) {
            global $database;
            $sql = "SELECT COUNT(*) FROM ".static::$table_name." WHERE id_korisnika=".$id;
            $result_set = $database->db_query($sql);
            $row = $database->db_fetch_array($result_set);
            xmlStatusSend( array_shift($row) );
        }

        

    }
?>