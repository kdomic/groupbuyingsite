<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1]				- Dohvati sve kategorije
		[2,'ID']		- Dohvati kategoriju sa ID
		[3, '-1', ...]	- Dodaj novu kategoriju
		[4, 'ID', ...]	- Ažuriraj kategorju

	*/

	$data = json_decode(stripslashes($_POST['data']));	
	switch((int)$data[0]){
		//case 1: Newsletter::getAll(); break;
		//case 2: Newsletter::get($data[1]);break;
		case 3: Newsletter::set($data);break;		
		//case 4: Newsletter::set($data);break;
	}


?>