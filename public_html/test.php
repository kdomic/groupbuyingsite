<?php

$handle = opendir('images');
while (false !== ($entry = readdir($handle)))
	print_r($entry);
closedir($handle);

?>