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
        	$l->datum = Vrijeme::nowWithOffset();
        	$l->save();
        }

        public static function getAll() //1
        {
            $_d = self::find_all();
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("logovi"));
            foreach ($_d as $d){
                $data = $root->appendChild($xmlDoc->createElement("log"));
                $k = Korisnici::find_by_id($d->id_korisnika);
                $d->id_korisnika = $k->ime.' '.$k->prezime;
                $l = Log_tip::find_by_id($d->id_tip);
                $d->id_tip = $l->opis;
                $d->datum = timeForScreenLong($d->datum);
                foreach ($d as $key => $value) {
                    $data->appendChild($xmlDoc->createElement($key, toUtf8($value)));
                }
            }
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }
    }
?>