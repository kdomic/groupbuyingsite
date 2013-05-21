<?php require_once('initialize.php'); ?>
<?php

    class Kosarica extends DatabaseObject { 

		protected static $table_name = "kosarica";
		protected static $db_fields = array('id','id_korisnika','id_akcije','operacija','datum');

		public $id;
		public $id_korisnika;
		public $id_akcije;
		public $operacija;
		public $datum;

        public static function kosaricaOp($item, $op){//1-dodano;2-kupljeno
            $k = new Kosarica();
            $k->id_korisnika = $_SESSION['user_id'];
            $k->id_akcije = $item;
            $k->operacija = $op;
            $k->datum = Vrijeme::nowWithOffset();
            $k->save();
        }

        public static function getAll(){
            $query  = 'SELECT ra.id_akcije, k.ime, k.prezime, p.naslov, kat.naziv as kategorija, prod.naziv as prodavatelj, r.datum, p.cijena, a.popust, a.granica, a.datum_zavrsetka ';
            $query .= 'FROM racuni AS r ';
            $query .= 'JOIN racuni_akcije AS ra ON ra.id_racuna=r.id ';
            $query .= 'JOIN akcije AS a ON ra.id_akcije=a.id ';
            $query .= 'JOIN ponude AS p ON a.id_ponude=p.id ';
            $query .= 'JOIN korisnici AS k ON r.id_korisnika=k.id ';            
            $query .= 'JOIN kategorije AS kat ON  p.id_kategorije=kat.id ';
            $query .= 'JOIN prodavatelji AS prod ON  p.id_prodavatelja=prod.id ';            
            $query .= 'ORDER BY r.datum ASC';
            $data = DatabaseObject::find_by_raw_sql($query);
            if(empty($data)){
                xmlStatusSend(0);
                return;
            }
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("kupnje"));
            foreach ($data as $d){
                $ponuda = $root->appendChild($xmlDoc->createElement("kupnja"));
                if(Vrijeme::isInTime($d['datum_zavrsetka'])){
                    $d['granica'] = 'A';
                } else if(Akcije::soldCount($d['id_akcije'])>=$d['granica']){
                    $d['granica'] = 'U';
                } else {
                    $d['granica'] = 'N';
                }
                $d['datum'] = date("d.m.Y.", strtotime($d['datum']));
                $d['cijena'] = $d['cijena']*(100-$d['popust'])/100;
                $d['cijena'] = str_replace('.', ',', sprintf("%01.2f", $d['cijena']));                                
                foreach ($d as $key => $value){
                    if($key=='popust') continue;
                    $ponuda->appendChild($xmlDoc->createElement(toUtf8($key), toUtf8($value)));
                }
            }

            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();            
        }

		public static function getUserPurchases($id){
			$query  = 'SELECT ra.id_akcije, a.id_ponude, r.datum, p.cijena, a.popust, p.naslov, a.granica, a.datum_zavrsetka ';
			$query .= 'FROM racuni AS r ';
			$query .= 'JOIN racuni_akcije AS ra ON ra.id_racuna=r.id ';
			$query .= 'JOIN akcije AS a ON ra.id_akcije=a.id ';
			$query .= 'JOIN ponude AS p ON a.id_ponude=p.id ';
			$query .= 'WHERE r.id_korisnika='.$id;
            $query .= ' ORDER BY r.datum ASC';
            $data = DatabaseObject::find_by_raw_sql($query);
			if(empty($data)){
                xmlStatusSend(0);
                return;
            }
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("kupnje"));
            foreach ($data as $d){
                $ponuda = $root->appendChild($xmlDoc->createElement("kupnja"));
                $d['id_ponude'] = ('offers/ponuda_'.sprintf("%05d", $d['id_ponude']).'/01.jpg');                
                if(Vrijeme::isInTime($d['datum_zavrsetka'])){
                    $d['datum'] = 'Aktivno';
                    $d['cijena'] = 'kupovinu';
                } else if(Akcije::soldCount($d['id_akcije'])>=$d['granica']){
                    $d['datum'] = date("d.m.Y.", strtotime($d['datum']));
                    $d['cijena'] = $d['cijena']*(100-$d['popust'])/100;
                    $d['cijena'] = str_replace('.', ',', sprintf("%01.2f", $d['cijena'])).' kn';                    
                } else {
                    $d['datum'] = 'Neuspjelo';
                    $d['cijena'] = 'kupovinu';
                }
                foreach ($d as $key => $value){
                	if($key=='popust') continue;
                    $ponuda->appendChild($xmlDoc->createElement(toUtf8($key), toUtf8($value)));
                }
            }
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();            
		}

    } 
?>