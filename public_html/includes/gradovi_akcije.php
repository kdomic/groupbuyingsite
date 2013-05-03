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


        public static function find_by_akcija($id) {
            return self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id_akcije=".$id);
        }

        public static function get($id) //1
        {
            $_d = self::find_by_akcija($id);
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("gradovi"));
            foreach ($_d as $d){
                $data = $root->appendChild($xmlDoc->createElement("grad"));
                $grad = Gradovi::find_by_id($d->id_grada);
                $d->id_grada = $grad->ime;
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
            $d = new Gradovi_akcije();
            $d->id_akcije = array_pop($data);
            $d->id_grada = array_pop($data);
            xmlStatusSend($d->save());
        }

        public static function remove($id) //5
        {                
            $d = self::find_by_id($id);
            xmlStatusSend($d->delete());
        }
    }
?>