<?php require_once('includes/initialize.php'); ?>
<?php
	$data = json_decode(stripslashes($_POST['data']));
	//$currentUser = $_SESSION['user_id'];
	/*if((int)$data[0]!=(int)$currentUser){
		xmlStatusSend(0);
		return;
	}*/
	$k = Korisnici::find_by_id($data[0]);	
	$xmlDoc = new DOMDocument();
	$root = $xmlDoc->appendChild($xmlDoc->createElement("korisnik"));
	$root->appendChild($xmlDoc->createElement("id", $k->id));
	$root->appendChild($xmlDoc->createElement("ime", $k->ime));
	$root->appendChild($xmlDoc->createElement("prezime", $k->prezime));
	$root->appendChild($xmlDoc->createElement("adresa", $k->adresa));
	$root->appendChild($xmlDoc->createElement("pbr", $k->pbr));
	$root->appendChild($xmlDoc->createElement("mjesto", $k->mjesto));
	$root->appendChild($xmlDoc->createElement("telefon", $k->telefon));
	$root->appendChild($xmlDoc->createElement("email", $k->email));
	$root->appendChild($xmlDoc->createElement("oib", $k->oib));
	$root->appendChild($xmlDoc->createElement("open_id", $k->open_id));
	$root->appendChild($xmlDoc->createElement("opomena", $k->opomena));
	$root->appendChild($xmlDoc->createElement("deaktiviran", $k->deaktiviran));
	$root->appendChild($xmlDoc->createElement("zamrznut", $k->zamrznut));
	$root->appendChild($xmlDoc->createElement("blokiran", $k->blokiran));
	$root->appendChild($xmlDoc->createElement("datum_registracije", $k->datum_registracije));
	$root->appendChild($xmlDoc->createElement("email_potvrda", $k->email_potvrda));
	$root->appendChild($xmlDoc->createElement("password", $k->password));
	$root->appendChild($xmlDoc->createElement("ovlasti", $k->ovlasti));	
	$root->appendChild($xmlDoc->createElement("aktivan", $k->aktivan));	
	header("Content-Type: text/xml");
    $xmlDoc->formatOutput = true;
    echo $xmlDoc->saveXML();
?>