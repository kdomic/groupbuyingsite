<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1]				- Print all
		[2, 'ID']		- All for Acions
		[3, ...]		- Add new
		[5, 'ID', ...]	- Delete
	*/
	$data = json_decode(stripslashes($_POST['data']));	
	switch((int)$data[0]){
		//case 1: Gradovi_akcije::getAll(); break;
		case 2: Gradovi_akcije::get($data[1]); break;
		case 3: Gradovi_akcije::set($data);break;		
		case 5: Gradovi_akcije::remove($data[1]);break;
	}

?>