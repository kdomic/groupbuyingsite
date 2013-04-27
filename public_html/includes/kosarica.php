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

		public static function getUserPurchases($id){
			$query  = 'SELECT ra.id_akcije, a.id_ponude, r.datum, p.cijena, a.popust, p.naslov ';
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
                $d['datum'] = date("d.m.Y.", strtotime($d['datum']));
                $d['cijena'] = $d['cijena']*(100-$d['popust'])/100;
                $d['cijena'] = str_replace('.', ',', sprintf("%01.2f", $d['cijena'])).' kn';
                foreach ($d as $key => $value){
                	if($key=='popust') continue;
                    $ponuda->appendChild($xmlDoc->createElement($key, $value));
                }
            }
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();            
		}

    } 
?>