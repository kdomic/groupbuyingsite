<?php require_once('initialize.php'); ?>
<?php
	class Login {

		public $ime;
		public $lozinka;

		function __construct() {
			$data = json_decode(stripslashes($_POST['data']));
			$korisnik = Korisnici::authenticate($data[0],$data[1]);
			if($korisnik)
				xmlStatusSend(1);
			else
				xmlStatusSend(0);
		}
	}
	$login = new Login();
?>