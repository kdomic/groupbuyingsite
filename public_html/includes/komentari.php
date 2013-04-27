<?php
    require_once('initialize.php');
    
    class Komantari extends DatabaseObject {
        protected static $table_name = "komentari";
        protected static $db_fields = array('id','id_korisnika','id_ponude','komentar','ocjena','datum','aktivan');
            public $id;         	//[0]
            public $id_korisnika;	//[1]
            public $id_ponude;   	//[2]
            public $komentar;    	//[3]
            public $ocjena;    		//[4]
            public $datum;    		//[5]
            public $aktivan;  		//[1]


       	public static function find_if_exist($id_korisnika, $id_ponude) {
            $result_array = self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id_korisnika={$id_korisnika} AND id_ponude={$id_ponude} LIMIT 1");
            return !empty($result_array) ? array_shift($result_array) : false;
        }

        public static function find_by_ponuda($id_ponude) {
            return self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id_ponude={$id_ponude}");
        }

        public static function canIpost($id_korisnika, $id_ponude){
			$query  = 'SELECT r.id_korisnika, a.id_ponude  ';
			$query .= 'FROM racuni AS r ';
			$query .= 'JOIN racuni_akcije AS ra ON ra.id_racuna=r.id ';
			$query .= 'JOIN akcije AS a ON a.id = ra.id_akcije ';
			$query .= 'WHERE r.id_korisnika ='.$id_korisnika.' ';
			$query .= 'AND a.id_ponude='.$id_ponude.' ';
			$data = DatabaseObject::find_by_raw_sql($query);
            if(empty($data)){
                xmlStatusSend(0);
            } else {
            	if(!self::find_if_exist($id_korisnika, $id_ponude))
            		xmlStatusSend(1);
            	else
            		xmlStatusSend(2);
            }
        }

        public static function set($data) {
			$k = new Komantari();
			if((int)$data[0]===4) $k = self::find_by_id($data[1]);
			$k->aktivan = array_pop($data);
			if((int)$data[0]===3)$k->datum = date("Y-m-d H:i:s");
			$k->ocjena = array_pop($data);
			$k->komentar = array_pop($data);
			$k->id_ponude = array_pop($data);
			$k->id_korisnika = array_pop($data);
			xmlStatusSend($k->save());
		}

		public static function getCommentForOffer($id_ponude) {
			$_d = self::find_by_ponuda($id_ponude);
			$xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("komentari"));
            foreach ($_d as $d){
                $data = $root->appendChild($xmlDoc->createElement("komentar"));
                $k = Korisnici::find_by_id($d->id_korisnika);                
                $d->id_korisnika = $k->ime.' '.$k->prezime;
                $d->ocjena = 'images/stars'.$d->ocjena.'.png';
                $d->datum = date("d.m.Y.", strtotime($d->datum));
                $d->aktivan = $d->aktivan==1 ? "Da" : "Ne";
                foreach ($d as $key => $value) {
                    $data->appendChild($xmlDoc->createElement($key, htmlentities($value)));
                }
            }
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
		}


    }
?>