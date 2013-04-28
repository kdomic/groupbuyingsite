<?php require_once('includes/initialize.php'); ?>
<?php

	/*
	Protocol legend
		[0] [1]     [2]      [3]    [4]   [5]         [6]
 		[1, OFFSET, HISTORY, TITLE, CITY, CATEGORIES, FILTER-ON] - data[1]>0 - dohvati ponude za početnu stranicu
		[1, ID,     HISTORY, TITLE, CITY, CATEGORIES, FILTER-ON] - data[1]<0 - dohvati ponude za detaljni prikaz
		[2, 0,      0,       TITLE, CITY, CATEGORIES, FILTER-ON]			 - prebroji koliko rezultata ima
	*/

	$data = json_decode(stripslashes($_POST['data']));	
	switch((int)$data[0]){
		case 1: XmlPonuda::get($data); break;
		case 2: XmlPonuda::count($data); break;
	}
?>