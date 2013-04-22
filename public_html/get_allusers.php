<?php require_once('includes/initialize.php'); ?>
<?php
	$_k = Korisnici::find_all();	
	$xmlDoc = new DOMDocument();
	$root = $xmlDoc->appendChild($xmlDoc->createElement("korisnici"));
	foreach($_k as $k){
		$korisnik = $root->appendChild($xmlDoc->createElement("korisnik"));
		$korisnik->appendChild($xmlDoc->createElement("id", $k->id));
		$korisnik->appendChild($xmlDoc->createElement("ime", $k->ime.' '.$k->prezime));
		$korisnik->appendChild($xmlDoc->createElement("email", $k->email));
		$korisnik->appendChild($xmlDoc->createElement("zamrznut", $k->zamrznut));
		$korisnik->appendChild($xmlDoc->createElement("blokiran", $k->blokiran ? "Da" : "Ne"));				
		$korisnik->appendChild($xmlDoc->createElement("deaktiviran", $k->deaktiviran ? "Da" : "Ne"));
		$korisnik->appendChild($xmlDoc->createElement("opomena", $k->opomena));		
	}

	header("Content-Type: text/xml");
    $xmlDoc->formatOutput = true;
    echo $xmlDoc->saveXML();
?>