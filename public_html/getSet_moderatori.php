<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1]				- Print all
		[3, ...]		- Add new
		[5, 'ID', ...]	- Delete

	*/
	$data = json_decode(stripslashes($_POST['data']));	
	switch((int)$data[0]){
		case 1: Moderatori::getAll(); break;
		case 3: Moderatori::set($data);break;		
		//case 5: Moderatori::set($data[1]);break;
	}

?>