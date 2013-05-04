<?php
    require_once('initialize.php');
    
    class Moderatori extends DatabaseObject {
        protected static $table_name = "moderatori";
        protected static $db_fields = array('id',
                                            'id_korisnika',
                                            'id_kategorije');
            public $id;             //[0]
            public $id_korisnika;   //[1]
            public $id_kategorije;  //[2]
        
        public static function find_by_korisnik($id_korisnika) {
            return self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id_korisnika=".$id_korisnika);
        }

        public static function getAll() //1
        {
            $_d = self::find_all();
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("moderatori"));
            foreach ($_d as $d){
                $data = $root->appendChild($xmlDoc->createElement("moderator"));
                $k = Korisnici::find_by_id($d->id_korisnika);
                $kat = Kategorije::find_by_id($d->id_kategorije);
                $d->id_korisnika = $k->ime.' '.$k->prezime;
                $d->id_kategorije = $kat->naziv;
                foreach ($d as $key => $value) {
                    $data->appendChild($xmlDoc->createElement($key, toUtf8($value)));
                }
            }
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }

        public static function set($data) //3,4
        {                
            $d = new Moderatori();
            $d->id_kategorije = array_pop($data);
            $d->id_korisnika = array_pop($data);
            xmlStatusSend($d->save());
            Logovi::logoviOp('13',$d->id_kategorije.";".$d->id_korisnika);
        }

        public static function remove($id) //5
        {                
            $d = self::find_by_id($id);
            Logovi::logoviOp('14',$d->id_kategorije.";".$d->id_korisnika);            
            xmlStatusSend($d->delete());
        }

    }
?>