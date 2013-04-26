<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1]				- Dohvati vrijeme
		[2]				- Postavi vrijme

	*/
	$data = json_decode(stripslashes($_POST['data']));	
	switch((int)$data[0]){
		case 1: Vrijeme::getOffsetXML(); break;
		case 2: Vrijeme::setOffset(); break;
	}

?>