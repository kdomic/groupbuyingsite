<?php
    require_once('initialize.php');
    
    class Vrijeme extends DatabaseObject {
        protected static $table_name = "vrijeme";
        protected static $db_fields = array('id', 'pomak');
        public $id;     //[0]
        public $pomak;  //[1]

        public static function setOffset(){
            $link = "http://arka.foi.hr/PzaWeb/PzaWeb2004/config/pomak.xml";
            $xml =  simplexml_load_file($link);
            $vrijeme = self::find_by_id(1);
            $vrijeme->pomak = $xml->vrijeme->pomak->attributes()->brojSati;
            $vrijeme->save();
        }

        public static function getOffsetXML(){
            $vrijeme = self::find_by_id(1);
            xmlStatusSend($vrijeme->pomak);
        }

        public static function getOffset(){
            $vrijeme = self::find_by_id(1);
            return $vrijeme->pomak;
        }
    }    

?>