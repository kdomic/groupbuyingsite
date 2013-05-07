<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[TYPE] - Result selector {1,2,3,4}
	*/
	$data = json_decode(stripslashes($_POST['data']));	
	switch((int)$data[0]){
		case 1: Statistics::getPonudeGradovi(); break;
		case 2: Statistics::getPonudeKategorije(); break;
		case 3: Statistics::getKorisniciPrijava(); break;
		case 4: Statistics::getKupljenoDodano(); break;

	}
?>