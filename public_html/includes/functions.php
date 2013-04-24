<?php

    function xmlStatusSend($status){
        $xmlDoc = new DOMDocument();
        $root = $xmlDoc->appendChild($xmlDoc->createElement("phpstatus"));
        $root->appendChild($xmlDoc->createElement("status", $status));
        header("Content-Type: text/xml");
        $xmlDoc->formatOutput = true;
        echo $xmlDoc->saveXML();
    }

    //Preuzeto sa: http://stackoverflow.com/questions/2982059/testing-if-string-is-sha1-in-php
	function is_sha1($str) {
	    return (bool) preg_match('/^[0-9a-f]{40}$/i', $str);
	}

?>