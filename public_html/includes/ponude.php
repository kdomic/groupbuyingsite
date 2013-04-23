<?php require_once('initialize.php'); ?>
<?php
    /*
        Protocol legend
        [1]             - getAll()
        [2,'ID']        - get()
        [3, '-1', ...]  - set() new
        [4, 'ID', ...]  - set() update
    */

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

        public static function getAll(){
            $_p = self::find_all();
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("ponude"));
            foreach ($_p as $p){
                $ponuda = $root->appendChild($xmlDoc->createElement("ponuda"));
                $prodavatelj = Korisnici::find_by_id($p->id_prodavatelja);
                $kategorija = Kategorije::find_by_id($p->id_kategorije);
                $p->id_prodavatelja = $prodavatelj->ime.' '.$prodavatelj->prezime ;                
                $p->id_kategorije = $kategorija->naziv;
                foreach ($p as $key => $value) {
                    $ponuda->appendChild($xmlDoc->createElement($key, htmlentities($value)));
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
            $prodavatelj = Korisnici::find_by_id($p->id_prodavatelja);
            $kategorija = Kategorije::find_by_id($p->id_kategorije);
            $p->id_prodavatelja = $prodavatelj->ime.' '.$prodavatelj->prezime ;                                        
            $p->id_kategorije = $kategorija->naziv;
            foreach ($p as $key => $value) {
                $ponuda->appendChild($xmlDoc->createElement($key, htmlentities($value)));
            }                        
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }

        public static function set($data)
        {         
            print_r($data);
            //$p = new Prodavatelji();
            //if((int)$data[0]===4) $p = self::find_by_id($data[1]);            
            //array_shift($data);
            //foreach ($p as $key => $value)
            //    $value = array_shift($data);
            //xmlStatusSend($p->save());
        }
    } 
?>