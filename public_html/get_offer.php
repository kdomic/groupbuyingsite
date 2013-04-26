<?php require_once('includes/initialize.php'); ?>
<?php
	if(isset($_GET['count']))
		XmlPonuda::count();
	if(isset($_GET['num']))
		XmlPonuda::get($_GET['num']);
?>