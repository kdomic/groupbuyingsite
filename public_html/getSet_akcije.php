<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1]				- Dohvati sve kategorije
		[2,'ID']		- Dohvati kategoriju sa ID
		[3, '-1', ...]	- Dodaj novu kategoriju
		[4, 'ID', ...]	- Ažuriraj kategorju
		[5, 'ID']		- Dobija ID akije, vraća ID slike

	*/
	$data = json_decode(stripslashes($_POST['data']));	
	switch((int)$data[0]){
		case 1: Akcije::getAll(); break;
		case 2: Akcije::get($data[1]);break;
		case 3: Akcije::set($data);break;		
		case 4: Akcije::set($data);break;
		case 5: Akcije::getPicId($data[1]);break;		
	}

?>