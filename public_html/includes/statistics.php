<?php
  require_once('initialize.php');

  class Statistics extends DatabaseObject {

		public static function getPonudeGradovi(){
			$query = 'SELECT g.ime, ';
			$query .= '(SELECT count(*) FROM gradovi_akcije AS ga ';
			$query .= 'JOIN akcije AS a ON a.id=ga.id_akcije ';
			$query .= 'WHERE ga.id_grada=g.id AND a.aktivan=1) AS broj_akcija ';
			$query .= 'FROM gradovi AS g ';
			$query .= 'WHERE g.aktivan=1 ';
			$query .= 'ORDER BY 2 DESC ';
			$data = DatabaseObject::find_by_raw_sql($query);
			self::send($data);			
		}

		public static function getPonudeKategorije(){
			$query = 'SELECT k.naziv, ';
			$query .= '(SELECT count(*) FROM akcije AS a JOIN ponude AS p ON p.id=a.id_ponude WHERE p.id_kategorije=k.id) as broj_akcija ';
			$query .= 'FROM kategorije AS k ';
			$query .= 'WHERE k.aktivan=1 ';
			$query .= 'ORDER BY 2 DESC ';
			$data = DatabaseObject::find_by_raw_sql($query);
			self::send($data);			
		}

		public static function getKorisniciPrijava(){
			$query = 'SELECT k.email, ';
			$query .= '(SELECT count(*) FROM logovi AS l WHERE l.id_korisnika=k.id AND l.id_tip=5) as broj_prijava ';
			$query .= 'FROM korisnici AS k ';
			$query .= 'WHERE k.aktivan=1 ';
			$query .= 'ORDER BY 2 DESC ';
			$query .= 'LIMIT 10 ';
			$data = DatabaseObject::find_by_raw_sql($query);
			self::send($data);			
		}

		public static function getKupljenoDodano(){
			$query = 'SELECT p.naslov, ';
			$query .= 'SUM((SELECT count(*) FROM kosarica AS k WHERE k.id_akcije=a.id AND k.operacija=2)) AS broj_kupovina, ';
			$query .= 'SUM((SELECT count(*) FROM kosarica AS k WHERE k.id_akcije=a.id AND k.operacija=1)) AS broj_dodavanja ';
			$query .= 'FROM akcije AS a ';
			$query .= 'JOIN ponude AS p ON p.id=a.id_ponude ';
			$query .= 'WHERE a.aktivan=1 ';
			$query .= 'GROUP BY 1 ';
			$query .= 'ORDER BY 2 DESC ';
			$data = DatabaseObject::find_by_raw_sql($query);
			self::send($data);
		}

		public static function send($_d)
        {
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("dataset"));
            foreach ($_d as $d){
                $data = $root->appendChild($xmlDoc->createElement("data"));
                foreach ($d as $key => $value) {
                    $data->appendChild($xmlDoc->createElement($key, toUtf8($value)));
                }
            }
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }

  }

?>