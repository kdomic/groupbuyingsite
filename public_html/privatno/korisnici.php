<?php require_once('../includes/korisnici.php'); ?>
<!DOCTYPE html>
<html>
<head>

	<title>PRIVATNO - Ispis korisnika</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">     
	<link rel="stylesheet" type="text/css" href="../stylesheet/jquery.dataTables.css" />       
	<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
</head>
<body>
	<?php
		$_k = Korisnici::find_all();
        echo "<table id=sviKorisnici>";
        echo "<thead>";
            echo "<tr><th>ID</th><th>Korisničko ime</th><th>Prezime</th><th>Ime</th><th>Email</th><th>Lozinka</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($_k as $k) {
            echo '<tr>';
                echo '<td>'.$k->id.'</td>';
                echo '<td>'.$k->email.'</td>';
                echo '<td>'.$k->prezime.'</td>';
                echo '<td>'.$k->ime.'</td>';
                echo '<td>'.$k->email.'</td>';  
                echo '<td>'.$k->password.'</td>';                                   
            echo '</tr>';
        }
        echo "</tbody>";
        echo "</table>";
	?>
	<script type="text/javascript">$('#sviKorisnici').dataTable();</script>
</body>
</html>