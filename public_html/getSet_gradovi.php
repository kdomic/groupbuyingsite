<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1]				- Dohvati sve kategorije
		[2,'ID']		- Dohvati kategoriju sa ID
		[3, '-1', ...]	- Dodaj novu kategoriju
		[4, 'ID', ...]	- Ažuriraj kategorju
		[5, ID_akcije]	- Oni koji još nisu pridruženi akciji
	*/

	$data = json_decode(stripslashes($_POST['data']));	
	switch((int)$data[0]){
		case 1: Gradovi::getAll(); break;
		case 2: Gradovi::get($data[1]);break;
		case 3: Gradovi::set($data);break;		
		case 4: Gradovi::set($data);break;
		case 5: Gradovi::getNotSelected($data[1]);break;		
	}


?>