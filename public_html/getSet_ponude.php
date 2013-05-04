<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1, VISIBLE-ONLY]	- getAll()
		[2,'ID']			- get()
		[3, '-1', ...]		- set() new
		[4, 'ID', ...]		- set() update
	*/

	$data = json_decode(stripslashes($_POST['data']));
	if(Korisnici::currentUserCredentialsValue()>1) {
        //ok
    } else {
        return -1;
    }		
    //echo "<pre>";
    //print_r($_POST['data']);
    //echo "</pre>";
	switch((int)$data[0]){
		case 1: Ponude::getAll($data); break;
		case 2: Ponude::get($data[1]); break;
		case 3: Ponude::set($data); break;		
		case 4: Ponude::set($data); break;
		case 5: Ponude::removeImg($data[1]); break;

	}
?>