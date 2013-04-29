<?php require_once('initialize.php'); ?>
<?php

    class Ponude extends DatabaseObject {
        protected static $table_name = "ponude";
        protected static $db_fields = array('id',
                                            'id_prodavatelja',
                                            'id_kategorije',
                                            'naslov',
                                            'podnaslov',
                                            'cijena',
                                            'opis_naslov',
                                            'opis_kratki',
                                            'opis',
                                            'napomena',
                                            'karta_x',
                                            'karta_y',
                                            'aktivan');
        public $id;
        public $id_prodavatelja;
        public $id_kategorije;
        public $naslov;
        public $podnaslov;
        public $cijena;
        public $opis_naslov;
        public $opis_kratki;
        public $opis;
        public $napomena;
        public $karta_x;
        public $karta_y;
        public $aktivan;

        public static function getAll($data){
            $_p = self::find_all();
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("ponude"));
            foreach ($_p as $p){                
                $prodavatelj = Prodavatelji::find_by_id($p->id_prodavatelja);
                $kategorija = Kategorije::find_by_id($p->id_kategorije);
                //if(isset($data[1]))
                    //if(!$p->aktivan || !$kategorija->aktivan || !$prodavatelj->aktivan)
                        //continue;
                $p->id_prodavatelja = $prodavatelj->naziv ;                                        
                $p->id_kategorije = $kategorija->naziv;
                $p->aktivan = $p->aktivan==1 ? "Da" : "Ne";
                $ponuda = $root->appendChild($xmlDoc->createElement("ponuda"));                            
                foreach ($p as $key => $value) {
                    $ponuda->appendChild($xmlDoc->createElement($key, toUtf8(htmlentities($value))));
                }
            }
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }

        public static function get($id){
            $p = self::find_by_id($id);
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("ponude"));
            $ponuda = $root->appendChild($xmlDoc->createElement("ponuda"));
            foreach ($p as $key => $value) {
                $ponuda->appendChild($xmlDoc->createElement($key, toUtf8(htmlentities($value))));
            }
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }

        public static function set($data)
        {         
            $p = new Ponude();
            if((int)$data[0]===4) $p = self::find_by_id($data[1]);            
            $p->aktivan = array_pop($data);
            $p->karta_y = array_pop($data);
            $p->karta_x = array_pop($data);
            $p->napomena = array_pop($data);
            $p->opis = array_pop($data);
            $p->opis_kratki = array_pop($data);
            $p->opis_naslov = array_pop($data);
            $p->cijena = array_pop($data);
            $p->podnaslov = array_pop($data);
            $p->naslov = array_pop($data);
            $p->id_kategorije = array_pop($data);
            $p->id_prodavatelja = array_pop($data);
            xmlStatusSend($p->save());            
        }
    } 
?>