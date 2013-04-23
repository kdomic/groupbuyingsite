<?php require_once('initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1]				- getAll()
		[2,'ID']		- get()
		[3, '-1', ...]	- set() new
		[4, 'ID', ...]	- set() update
	*/
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
				$prodavatelj->appendChild($xmlDoc->createElement("id_korisnika", $k->ime.' '.$k->prezime));
				$prodavatelj->appendChild($xmlDoc->createElement("naziv", $p->naziv));
				$prodavatelj->appendChild($xmlDoc->createElement("adresa", $p->adresa));
				$prodavatelj->appendChild($xmlDoc->createElement("kontakt", $p->kontakt));
				$prodavatelj->appendChild($xmlDoc->createElement("info", $p->info));
				$prodavatelj->appendChild($xmlDoc->createElement("oib", $p->oib));
				$prodavatelj->appendChild($xmlDoc->createElement("aktivan", $p->aktivan==1 ? "Da" : "Ne"));	
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
			$prodavatelj->appendChild($xmlDoc->createElement("id", $p->id));
			$prodavatelj->appendChild($xmlDoc->createElement("id_korisnika", $p->id_korisnika));
			$prodavatelj->appendChild($xmlDoc->createElement("naziv", $p->naziv));
			$prodavatelj->appendChild($xmlDoc->createElement("adresa", $p->adresa));
			$prodavatelj->appendChild($xmlDoc->createElement("kontakt", $p->kontakt));
			$prodavatelj->appendChild($xmlDoc->createElement("info", $p->info));
			$prodavatelj->appendChild($xmlDoc->createElement("oib", $p->oib));
			$prodavatelj->appendChild($xmlDoc->createElement("aktivan", $p->aktivan==1 ? "Da" : "Ne"));				
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