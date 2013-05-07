<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1,]
	*/
	$data = json_decode(stripslashes($_POST['data']));
	if(Korisnici::currentUserCredentialsValue()==3) {
        //ok
    } else {
        return -1;
    }		
	switch((int)$data[0]){
		case 1: Logovi::getAll(); break;		
	}

?>