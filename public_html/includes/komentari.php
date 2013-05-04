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
            return self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id_ponude={$id_ponude} AND aktivan=1");
        }

        public static function canIpost($id_korisnika, $id_akcije){
            $akcija = Akcije::find_by_id($id_akcije);
            $query   = 'SELECT r.id_korisnika, p.id ';
            $query  .= 'FROM ponude AS p ';
            $query  .= 'JOIN akcije AS a ON a.id_ponude=p.id ';
            $query  .= 'JOIN racuni_akcije AS ra ON ra.id_akcije=a.id ';
            $query  .= 'JOIN racuni AS r ON r.id=ra.id_racuna ';
            $query  .= 'WHERE p.id='.$akcija->id_ponude;
            $query  .= ' AND r.id_korisnika='.$id_korisnika;
			$data = DatabaseObject::find_by_raw_sql($query);
            if(empty($data)){
                xmlStatusSend(0);
            } else {
            	if(!self::find_if_exist($id_korisnika, $akcija->id_ponude))
            		xmlStatusSend(1);
            	else
            		xmlStatusSend(2);
            }
        }

        public static function getAll() {
            $_d = self::find_all();
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
                    $data->appendChild($xmlDoc->createElement($key, toUtf8($value)));
                }
                $p = Ponude::find_by_id($d->id_ponude);
                $data->appendChild($xmlDoc->createElement("ponuda", toUtf8($p->naslov)));
            }
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }

        public static function set($data) {
			$k = new Komantari();
			if((int)$data[0]===4) $k = self::find_by_id($data[1]);
			$k->aktivan = array_pop($data);
			if((int)$data[0]===3)$k->datum = date("Y-m-d H:i:s");
			$k->ocjena = array_pop($data);
			$k->komentar = nl2br(array_pop($data));
			$k->id_ponude = array_pop($data);
            $akcija = Akcije::find_by_id($k->id_ponude);
            $k->id_ponude = $akcija->id_ponude;
			$k->id_korisnika = array_pop($data);
			xmlStatusSend($k->save());
		}

		public static function getCommentForOffer($id_akcije) {
            $akcija = Akcije::find_by_id($id_akcije);
			$_d = self::find_by_ponuda($akcija->id_ponude);
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
                    $data->appendChild($xmlDoc->createElement($key, toUtf8($value)));
                }
            }
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
		}

        public static function changeVisibility($id){
            $d = self::find_by_id($id);
            $d->aktivan += 1;
            $d->aktivan %= 2;
            xmlStatusSend($d->save());
            Logovi::logoviOp('12',$d->id);
        }


    }
?>