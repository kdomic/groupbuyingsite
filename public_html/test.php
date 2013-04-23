<?php require_once('includes/initialize.php'); ?>
<pre>
	<?php
		$k = Kategorije::find_all();
		print_r($k)	;
	?>
</pre>