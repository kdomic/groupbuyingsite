<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1]				- getAll()
		[2,'ID']		- get()
		[3, '-1', ...]	- set() new
		[4, 'ID', ...]	- set() update
		[5, 'ID'] 		- count();
	*/

	$data = json_decode(stripslashes($_POST['data']));	
	switch((int)$data[0]){
		//case 1: Opomene::getAll(); break;
		case 2: Opomene::get($data[1]);break;
		case 3: Opomene::set($data);break;
		//case 4: Opomene::set($data);break;
		case 5: Opomene::count($data[1]);break;
		case 6: Opomene::getLast($data[1]);break;
	}

?>