<?php
    class Kategorije extends DatabaseObject { 

		protected static $table_name = "kategorije";
		protected static $db_fields = array('id','naziv','aktivna');

		public $id;
		public $naziv;
		public $aktivna;

		public static function getAllCategories(){
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

		public static function getCategory($id){
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
		public static function setCategory($data)
		{
			$k = new Kategorije();
			if((int)$data[0]===4) $k = self::find_by_id($data[1]);
			$k->naziv = $data[2];
			$k->aktivna = $data[3];
			print_r($k);			
			xmlStatusSend($k->save());
		}
    } 
?>