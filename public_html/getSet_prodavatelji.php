<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1]				- getAll()
		[2,'ID']		- get()
		[3, '-1', ...]	- set() new
		[4, 'ID', ...]	- set() update
	*/

	$data = json_decode(stripslashes($_POST['data']));
	if(Korisnici::currentUserCredentialsValue()>1) {
        //ok
    } else {
        return -1;
    }			
	switch((int)$data[0]){
		case 1: Prodavatelji::getAll(); break;
		case 2: Prodavatelji::get($data[1]);break;
		case 3: Prodavatelji::set($data);break;		
		case 4: Prodavatelji::set($data);break;
	}

?>