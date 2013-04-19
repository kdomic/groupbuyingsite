<?php

    function xmlStatusSend($status){
        $xmlDoc = new DOMDocument();
        $root = $xmlDoc->appendChild($xmlDoc->createElement("phpstatus"));
        $root->appendChild($xmlDoc->createElement("status", $status));
        header("Content-Type: text/xml");
        $xmlDoc->formatOutput = true;
        echo $xmlDoc->saveXML();
    }

?>