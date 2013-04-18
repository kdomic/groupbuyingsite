<?php require_once('includes/initialize.php'); ?>
<pre>
<?php
    $ponuda = Ponude::find_by_id(1);
    print_r($ponuda);
?>
</pre>