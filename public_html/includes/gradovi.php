<?php
    require_once('initialize.php');
    
    class Gradovi extends DatabaseObject {
        protected static $table_name = "gradovi";
        protected static $db_fields = array('id',
                                            'ime',
                                            'aktivan');
            public $id;         //[0]
            public $ime;       //[1]
            public $aktivan;    //[2]

            public static function getAll() //1
            {
                $_d = self::find_all();
                $xmlDoc = new DOMDocument();
                $root = $xmlDoc->appendChild($xmlDoc->createElement("gradovi"));
                foreach ($_d as $d){
                    $data = $root->appendChild($xmlDoc->createElement("grad"));
                    $d->aktivan = $d->aktivan==1 ? "Da" : "Ne";
                    foreach ($d as $key => $value) {
                        $data->appendChild($xmlDoc->createElement($key, toUtf8($value)));
                    }
                }
                header("Content-Type: text/xml");
                $xmlDoc->formatOutput = true;
                echo $xmlDoc->saveXML();
            }

            public static function get($id) //2
            {
                $d = self::find_by_id($id);
                $xmlDoc = new DOMDocument();
                $root = $xmlDoc->appendChild($xmlDoc->createElement("gradovi"));
                $data = $root->appendChild($xmlDoc->createElement("grad"));
                foreach ($d as $key => $value) {
                    $data->appendChild($xmlDoc->createElement($key, toUtf8($value)));
                }
                header("Content-Type: text/xml");
                $xmlDoc->formatOutput = true;
                echo $xmlDoc->saveXML();
            }

            public static function set($data) //3,4
            {                
                $d = new Gradovi();
                if((int)$data[0]===4) $d = self::find_by_id($data[1]);            
                $d->aktivan = array_pop($data);
                $d->ime = array_pop($data);
                xmlStatusSend($d->save());
                Logovi::logoviOp('8',$d->id);
            }

            public static function getNotSelected($id) //5
            {                
                $query  = "SELECT * FROM gradovi AS g ";
                $query .= "WHERE NOT EXISTS (SELECT * FROM gradovi_akcije AS ga WHERE ga.id_grada=g.id AND ga.id_akcije={$id})";            
                $_k = self::find_by_sql($query);
                $xmlDoc = new DOMDocument();
                $root = $xmlDoc->appendChild($xmlDoc->createElement("gradovi"));
                foreach($_k as $k){
                    $kategorija = $root->appendChild($xmlDoc->createElement("grad"));
                    $kategorija->appendChild($xmlDoc->createElement("id", toUtf8($k->id)));
                    $kategorija->appendChild($xmlDoc->createElement("ime", toUtf8($k->ime)));
                    $kategorija->appendChild($xmlDoc->createElement("aktivan", toUtf8($k->aktivan)));                    
                }
                header("Content-Type: text/xml");
                $xmlDoc->formatOutput = true;
                echo $xmlDoc->saveXML();
            }
    }
?>