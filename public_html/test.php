<?php require_once('includes/initialize.php'); ?>
<pre>
	<?php
		$ponude = Gradovi_akcije::find_all();
		print_r($ponude);		
	?>
</pre>














<?php /*
	$ponude = Ponude::find_all();
	foreach ($ponude as $p) {
		$nova = Ponude::find_by_id($p->id);
		foreach ($p as $key => $value) {
			$nova->$key = strip_tags($value);
			//$value = strip_tags($value);
			//print_r($key);
		}
		$nova->save();
		//print_r($p);
	}
	echo "kraj";;*/
?>