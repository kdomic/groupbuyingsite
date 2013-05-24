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
    <h1>Izdvojeni korisnici za testiranje</h1>
    <table id="izdvojeno">
        <thead>
            <tr>
                <th>Razina</th>
                <th>Email</th>
                <th>Lozinka</th>
                <th>Prava</th>                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>admin@admin.com</td>
                <td>admin</td>
                <td>Administrator</td>                
            </tr>
            <tr>
                <td>2</td>
                <td>mod@mod.com</td>
                <td>mod</td>
                <td>Moderator (kat. Edukacija)</td>                
            </tr>
            <tr>
                <td>3</td>
                <td>webdip@webdip.com</td>
                <td>webdip</td>
                <td>Korisnik</td>                
            </tr>
        </tbody>
    </table>
    <br><br>
    <h1>Svi korisnici</h1>
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
	<script type="text/javascript">
        $('#izdvojeno').dataTable();    
        $('#sviKorisnici').dataTable();
    </script>
</body>
</html>