<?php require_once('includes/initialize.php'); ?>
<pre>
	<?php
	print_r($_SESSION['basket']);
	echo "<br>";
	$data = explode(';', $_SESSION['basket']);
	print_r($data);
	echo "<br>";
	print_r($data);
	
	?>
</pre>