<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1]				- Dohvati vrijeme
		[2]				- Postavi vrijme

	*/
	$data = json_decode(stripslashes($_POST['data']));	
	if(Korisnici::currentUserCredentialsValue()==3) {
        //ok
    } else {
        return -1;
    }		
	switch((int)$data[0]){
		case 1: Vrijeme::getOffsetXML(); break;
		case 2: Vrijeme::setOffset(); break;
	}

?>