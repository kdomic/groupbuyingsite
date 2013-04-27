<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1,]
		[2, 'ID']
	*/
	$data = json_decode(stripslashes($_POST['data']));	
	switch((int)$data[0]){
		case 1: Kosarica::getAll(); break;		
		case 2: Kosarica::getUserPurchases($data[1]); break;
	}

?>