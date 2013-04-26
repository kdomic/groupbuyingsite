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

        public static function timeWithOffset($datetime){
            $vrijeme = self::find_by_id(1);
            $date = date('Y-m-d H:i:s', strtotime($datetime)+(1*60*60*(int)$vrijeme->pomak));
            return $date;
        }

        public static function remainingTime($datetime){
            $future = strtotime($datetime);
            $now = strtotime(date("Y-m-d H:i:s"));
            $diff = $future - $now;
            if($diff>0) {
                $s = $diff%60;
                $m = floor(($diff%3600)/60);
                $h = floor(($diff%86400)/3600);
                $d = floor($diff/86400);
                return "$d dana $h:$m:$s";
            }
            else
                return "0000-00-00 00:00:00";
        }
    }    

?>