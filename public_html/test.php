<?php require_once('includes/initialize.php'); ?>
<pre>
	<?php
		$p = Prodavatelji::find_by_id(1);
		print_r($p);
		array_reverse($p);
	?>
</pre>