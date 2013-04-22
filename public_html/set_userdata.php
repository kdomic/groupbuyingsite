<?php require_once('includes/initialize.php'); ?>
<?php
	$data = json_decode(stripslashes($_POST['data']));
	//$currentUser = $_SESSION['user_id'];
	/*if((int)$data[0]!=(int)$currentUser){
		xmlStatusSend(0);
		return;
	}*/
	$k = Korisnici::find_by_id($data[0]);
	$k->ime = $data[1];
	$k->prezime = $data[2];
	$k->adresa = $data[3];
	$k->pbr = $data[4];
	$k->mjesto = $data[5];
	$k->telefon = $data[6];
	$k->email = $data[7];
	$k->oib = $data[8];
	$k->open_id = $data[9];
	$k->opomena = $data[10];
	$k->deaktiviran = $data[11];
	$k->zamrznut = $data[12];
	$k->blokiran = $data[13];
	$k->datum_registracije = $data[14];
	$k->email_potvrda = $data[15];
	$k->password = is_sha1($data[16]) ? $data[16] : sha1($data[16]);
	$k->ovlasti = $data[17];
	$k->aktivan = $data[18];
	xmlStatusSend($k->save());
?>

<?php
	//Preuzeto sa: http://stackoverflow.com/questions/2982059/testing-if-string-is-sha1-in-php
	function is_sha1($str) {
	    return (bool) preg_match('/^[0-9a-f]{40}$/i', $str);
	}
?>