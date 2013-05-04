<?php
    require_once('initialize.php');
    
    class Akcije extends DatabaseObject {
        protected static $table_name = "akcije";
        protected static $db_fields = array('id',
                                            'id_ponude',
                                            'popust',
                                            'datum_pocetka',
                                            'datum_zavrsetka',
                                            'granica',
                                            'istaknuto',
                                            'aktivan');
            public $id;                 //[0]
            public $id_ponude;          //[1]
            public $popust;             //[2]
            public $datum_pocetka;      //[3]
            public $datum_zavrsetka;    //[4]
            public $granica;            //[5]
            public $istaknuto;          //[6]
            public $aktivan;            //[7]
            
            public static function getAll() //1
            {
                $_d = self::find_all();
                $xmlDoc = new DOMDocument();
                $root = $xmlDoc->appendChild($xmlDoc->createElement("akcije"));
                foreach ($_d as $d){
                    $data = $root->appendChild($xmlDoc->createElement("akcija"));
                    $ponuda = Ponude::find_by_id($d->id_ponude);
                    $d->id_ponude = $ponuda->naslov;
                    $d->datum_pocetka = timeForScreenLong($d->datum_pocetka);
                    $d->datum_zavrsetka = timeForScreenLong($d->datum_zavrsetka);                    
                    $d->istaknuto = $d->istaknuto==1 ? "Da" : "Ne";
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
                $root = $xmlDoc->appendChild($xmlDoc->createElement("akcije"));
                $data = $root->appendChild($xmlDoc->createElement("akcija"));
                foreach ($d as $key => $value) {
                    $data->appendChild($xmlDoc->createElement($key, toUtf8($value)));
                }
                header("Content-Type: text/xml");
                $xmlDoc->formatOutput = true;
                echo $xmlDoc->saveXML();
            }

            public static function set($data) //3,4
            {                
                $d = new Akcije();
                if((int)$data[0]===4) $d = self::find_by_id($data[1]);            
                $d->aktivan = array_pop($data);
                $d->istaknuto = array_pop($data);
                $d->granica = array_pop($data);
                $d->datum_zavrsetka = timeForMysql(array_pop($data));
                $d->datum_pocetka = timeForMysql(array_pop($data));
                $d->popust = array_pop($data);
                $d->id_ponude = array_pop($data);
                xmlStatusSend($d->save());
                Logovi::logoviOp('11',$d->id);                       
            }

            public static function getPicId($id) //5
            {
                $d = self::find_by_id($id);
                xmlStatusSend($d->id_ponude);
            }

    }
?>