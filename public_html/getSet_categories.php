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
		case 1: Kategorije::getAllCategories(); break;
		case 2: Kategorije::getCategory($data[1]);break;
		case 3: Kategorije::setCategory($data);break;		
		case 4: Kategorije::setCategory($data);break;
	}

?>