<?php
	$sh1 = sha1('kruno');
	$sh2 = sha1('kruno1');
	if($sh1===$sh2) echo "ok";
	else echo "error";
	print_r($sh1);
	echo "<br>";
	print_r($sh2);
?>