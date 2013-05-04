<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1]				- Print all
		[3, ...]		- Add new
		[5, 'ID', ...]	- Delete

	*/
	$data = json_decode(stripslashes($_POST['data']));	
	if(Korisnici::currentUserCredentialsValue()==3) {
        //ok
    } else {
        return -1;
    }	
	switch((int)$data[0]){
		case 1: Moderatori::getAll(); break;
		case 3: Moderatori::set($data);break;		
		case 5: Moderatori::remove($data[1]);break;
	}

?>