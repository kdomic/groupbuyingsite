<?php require_once('initialize.php'); ?>
<?php

	class Prodavatelji extends DatabaseObject { 

		protected static $table_name = "prodavatelji";
		protected static $db_fields = array('id','id_korisnika','naziv','adresa','kontakt','info','oib','aktivan');

		public $id;
		public $id_korisnika;
		public $naziv;
		public $adresa;
		public $kontakt;
		public $info;
		public $oib;
		public $aktivan;

		public static function getAll(){
			$_p = self::find_all();
			$xmlDoc = new DOMDocument();
			$root = $xmlDoc->appendChild($xmlDoc->createElement("prodavatelji"));
			foreach ($_p as $p) {
				$prodavatelj = $root->appendChild($xmlDoc->createElement("prodavatelj"));				
				$prodavatelj->appendChild($xmlDoc->createElement("id", $p->id));
				$k = Korisnici::find_by_id($p->id_korisnika);
				$prodavatelj->appendChild($xmlDoc->createElement("id_korisnika", toUtf8($k->ime.' '.$k->prezime)));
				$prodavatelj->appendChild($xmlDoc->createElement("naziv", toUtf8($p->naziv)));
				$prodavatelj->appendChild($xmlDoc->createElement("adresa", toUtf8($p->adresa)));
				$prodavatelj->appendChild($xmlDoc->createElement("kontakt", toUtf8($p->kontakt)));
				$prodavatelj->appendChild($xmlDoc->createElement("info", toUtf8($p->info)));
				$prodavatelj->appendChild($xmlDoc->createElement("oib", toUtf8($p->oib)));
				$prodavatelj->appendChild($xmlDoc->createElement("aktivan", $p->aktivan==1 ? toUtf8("Da") : toUtf8("Ne")));	
			}
			header("Content-Type: text/xml");
			$xmlDoc->formatOutput = true;
			echo $xmlDoc->saveXML();
		}

		public static function get($id){
			$p = self::find_by_id($id);
			$xmlDoc = new DOMDocument();
			$root = $xmlDoc->appendChild($xmlDoc->createElement("prodavatelji"));
			$prodavatelj = $root->appendChild($xmlDoc->createElement("prodavatelj"));
			$prodavatelj->appendChild($xmlDoc->createElement("id_korisnika", toUtf8($k->ime.' '.$k->prezime)));
			$prodavatelj->appendChild($xmlDoc->createElement("naziv", toUtf8($p->naziv)));
			$prodavatelj->appendChild($xmlDoc->createElement("adresa", toUtf8($p->adresa)));
			$prodavatelj->appendChild($xmlDoc->createElement("kontakt", toUtf8($p->kontakt)));
			$prodavatelj->appendChild($xmlDoc->createElement("info", toUtf8($p->info)));
			$prodavatelj->appendChild($xmlDoc->createElement("oib", toUtf8($p->oib)));
			$prodavatelj->appendChild($xmlDoc->createElement("aktivan", $p->aktivan==1 ? toUtf8("Da") : toUtf8("Ne")));				
			header("Content-Type: text/xml");
			$xmlDoc->formatOutput = true;
			echo $xmlDoc->saveXML();
		}

		public static function set($data)
		{			
			$p = new Prodavatelji();
			if((int)$data[0]===4) $p = self::find_by_id($data[1]);
			$p->aktivan = array_pop($data);
			$p->oib = array_pop($data);
			$p->info = array_pop($data);
			$p->kontakt = array_pop($data);
			$p->adresa = array_pop($data);
			$p->naziv = array_pop($data);
			$p->id_korisnika = array_pop($data);
			xmlStatusSend($p->save());
		}
    } 
?>