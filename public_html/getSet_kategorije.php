<?php require_once('includes/initialize.php'); ?>
<?php
	/*
	Protocol legend
		[1]				- Dohvati sve kategorije
		[2,'ID']		- Dohvati kategoriju sa ID
		[3, '-1', ...]	- Dodaj novu kategoriju
		[4, 'ID', ...]	- Ažuriraj kategorju
		[5, 'ID'	 ]	- kategorije koje korisniku još nisu pridružene
		[6]				- kategorije za filter
	*/
	$data = json_decode(stripslashes($_POST['data']));
	if(Korisnici::currentUserCredentialsValue()>1) {
        //ok
    } else {
        return -1;
    }			
	switch((int)$data[0]){
		case 1: Kategorije::getAll(); break;
		case 2: Kategorije::get($data[1]); break;
		case 3: Kategorije::set($data); break;		
		case 4: Kategorije::set($data); break;
		case 5: Kategorije::getNotSelected($data[1]); break;
		case 6: Kategorije::getAllForMods(); break;
	}

?>