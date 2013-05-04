<?php

    class Kategorije extends DatabaseObject { 

		protected static $table_name = "kategorije";
		protected static $db_fields = array('id','naziv','aktivan');

		public $id;
		public $naziv;
		public $aktivan;

		public static function getAll(){
			$_k = self::find_all();		
			$xmlDoc = new DOMDocument();
			$root = $xmlDoc->appendChild($xmlDoc->createElement("kategorije"));
			foreach($_k as $k){
				$kategorija = $root->appendChild($xmlDoc->createElement("kategorija"));
				$kategorija->appendChild($xmlDoc->createElement("id", toUtf8($k->id)));
				$kategorija->appendChild($xmlDoc->createElement("naziv", toUtf8($k->naziv)));
				$kategorija->appendChild($xmlDoc->createElement("aktivan", $k->aktivan ? toUtf8("Da") : toUtf8("Ne")));		
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
			$kategorija->appendChild($xmlDoc->createElement("aktivan", $k->aktivan ? "Da" : "Ne"));		
			header("Content-Type: text/xml");
			$xmlDoc->formatOutput = true;
			echo $xmlDoc->saveXML();            		
		}

		public static function getNotSelected($id){
			$query  = "SELECT * FROM kategorije AS k ";
			$query .= "WHERE NOT EXISTS (SELECT * FROM moderatori AS m WHERE k.id=m.id_kategorije AND m.id_korisnika={$id})";
			$_k = self::find_by_sql($query);
			$xmlDoc = new DOMDocument();
			$root = $xmlDoc->appendChild($xmlDoc->createElement("kategorije"));
			foreach($_k as $k){
				$kategorija = $root->appendChild($xmlDoc->createElement("kategorija"));
				$kategorija->appendChild($xmlDoc->createElement("id", toUtf8($k->id)));
				$kategorija->appendChild($xmlDoc->createElement("naziv", toUtf8($k->naziv)));
				$kategorija->appendChild($xmlDoc->createElement("aktivan", $k->aktivan ? toUtf8("Da") : toUtf8("Ne")));	
			}
			header("Content-Type: text/xml");
			$xmlDoc->formatOutput = true;
			echo $xmlDoc->saveXML();			
		}
		
		public static function set($data)
		{
			$k = new Kategorije();
			if((int)$data[0]===4) $k = self::find_by_id($data[1]);
			$k->naziv = $data[2];
			$k->aktivan = $data[3];
			xmlStatusSend($k->save());
			Logovi::logoviOp('7',$k->id);
		}
    } 
?>