<?php

	/*
	Protocol legend
		[1]				- Dohvati sve kategorije
		[2,'ID']		- Dohvati kategoriju sa ID
		[3, '-1', ...]	- Dodaj novu kategoriju
		[4, 'ID', ...]	- Ažuriraj kategorju

	*/

    class Kategorije extends DatabaseObject { 

		protected static $table_name = "kategorije";
		protected static $db_fields = array('id','naziv','aktivna');

		public $id;
		public $naziv;
		public $aktivna;

		public static function getAll(){
			$_k = self::find_all();		
			$xmlDoc = new DOMDocument();
			$root = $xmlDoc->appendChild($xmlDoc->createElement("kategorije"));
			foreach($_k as $k){
				$kategorija = $root->appendChild($xmlDoc->createElement("kategorija"));
				$kategorija->appendChild($xmlDoc->createElement("id", $k->id));
				$kategorija->appendChild($xmlDoc->createElement("naziv", $k->naziv));
				$kategorija->appendChild($xmlDoc->createElement("aktivna", $k->aktivna ? "Da" : "Ne"));		
			}
			header("Content-Type: text/xml");
			$xmlDoc->formatOutput = true;
			echo $xmlDoc->saveXML();
		}

		public static function get($id){
			$k = self::find_by_id($id);
			$xmlDoc = new DOMDocument();
			$root = $xmlDoc->appendChild($xmlDoc->createElement("kategorije"));
			$kategorija = $root->appendChild($xmlDoc->createElement("kategorija"));
			$kategorija->appendChild($xmlDoc->createElement("id", $k->id));
			$kategorija->appendChild($xmlDoc->createElement("naziv", $k->naziv));
			$kategorija->appendChild($xmlDoc->createElement("aktivna", $k->aktivna ? "Da" : "Ne"));		
			header("Content-Type: text/xml");
			$xmlDoc->formatOutput = true;
			echo $xmlDoc->saveXML();
		}
		public static function set($data)
		{
			$k = new Kategorije();
			if((int)$data[0]===4) $k = self::find_by_id($data[1]);
			$k->naziv = $data[2];
			$k->aktivna = $data[3];
			xmlStatusSend($k->save());
		}
    } 
?>