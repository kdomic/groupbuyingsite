<?php

    function xmlStatusSend($status){
        $xmlDoc = new DOMDocument();
        $root = $xmlDoc->appendChild($xmlDoc->createElement("phpstatus"));
        $root->appendChild($xmlDoc->createElement("status", utf8_encode($status)));
        header("Content-Type: text/xml");
        $xmlDoc->formatOutput = true;
        echo $xmlDoc->saveXML();
    }

    function timeForMysql($value=''){
        return date("Y-m-d H:i:s",strtotime($value));
    }

    function toUtf8($value) {
        return mb_detect_encoding($value, "UTF-8") == "UTF-8" ? $value : $s = utf8_encode($value);
    }

    //Preuzeto sa: http://stackoverflow.com/questions/2982059/testing-if-string-is-sha1-in-php
	function is_sha1($str) {
	    return (bool) preg_match('/^[0-9a-f]{40}$/i', $str);
	}

?>