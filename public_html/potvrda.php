<?php require_once('includes/initialize.php'); ?>
<?php
	if(isset($_GET['potvrda'])){
		$korisnik = Korisnici::find_by_potvrda($_GET['potvrda']);
		if(!$korisnik){
			echo "Potvrda ne postoji ili je iskori&#353;tena";
		} else {
			$reg = date('Y-m-d H:i:s', strtotime($korisnik->datum_registracije.'+1 day'));
			if(Vrijeme::isInTime($reg)){
				$korisnik->email_potvrda = 'aktivan';
				$korisnik->save();
				Logovi::logoviOp('2',$korisnik->id);
				echo "Aktivirano!";
			} else {
				echo "Vrijeme za registraciju isteklo!";
			}
		}
	}else{
		echo "Krivi upit!";
	}
	echo "<br><a href='index.php'>Nazad</a>";
?>