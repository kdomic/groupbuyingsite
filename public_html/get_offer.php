<?php require_once('includes/initialize.php');?>
<?php
    $offer = new XmlPonuda();
    $xmlDoc = new DOMDocument();
    $root = $xmlDoc->appendChild($xmlDoc->createElement("RecentTutorials"));
    $offerTag = $root->appendChild($xmlDoc->createElement("offer"));
    $offerTag->appendChild($xmlDoc->createAttribute("id"))->appendChild($xmlDoc->createTextNode($offer->id));
    $offerTag->appendChild($xmlDoc->createElement("title", $offer->title));
    $offerTag->appendChild($xmlDoc->createElement("subtitle", $offer->subtitle));
    $offerTag->appendChild($xmlDoc->createElement("sliderOfferBuy", $offer->sliderOfferBuy));
    $offerTag->appendChild($xmlDoc->createElement("sliderOfferDiscountU", $offer->sliderOfferDiscountU));
    $offerTag->appendChild($xmlDoc->createElement("sliderOfferDiscountP", $offer->sliderOfferDiscountP));
    $offerTag->appendChild($xmlDoc->createElement("sliderOfferDiscountV", $offer->sliderOfferDiscountV));
    $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtT1", $offer->sliderOfferBoughtT1));
    $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtT2", $offer->sliderOfferBoughtT2));
    $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtVal", $offer->sliderOfferBoughtVal));
    $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtMax", $offer->sliderOfferBoughtMax));
    $offerTag->appendChild($xmlDoc->createElement("sliderOfferTime", $offer->sliderOfferTime));        
    $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtImg", $offer->sliderOfferBoughtImg));
    header("Content-Type: text/plain");
    $xmlDoc->formatOutput = true;
    echo $xmlDoc->saveXML();    
?>