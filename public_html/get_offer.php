<?php require_once('includes/initialize.php'); ?>
<?php

	/*
	Protocol legend
		[1, ID]				- get(): 	ako je ID>0 onda je offset, ako je ID<0 onda dohvati akciju sa |ID|
		[2]					- count(): 	broj aktivnih akcija (zbog gumba UČITAJ VIŠE)
	*/

	$data = json_decode(stripslashes($_POST['data']));	
	switch((int)$data[0]){
		case 1: XmlPonuda::get($data[1]); break;
		case 2: XmlPonuda::count(); break;
		//case 3: Prodavatelji::set($data); break;		
		//case 4: Prodavatelji::set($data); break;
	}


	/*if(isset($_GET['count']))
		XmlPonuda::count();
	if(isset($_GET['num']))
		XmlPonuda::get($_GET['num']);*/
?>