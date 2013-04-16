<?php
$dbc = mysql_connect("localhost", "root", "");
if (!$dbc) {
    echo "Problem kod povezivanja na bazu podataka!";
    exit;
}


$db = mysql_select_db("WebDiP2012_013", $dbc);
if (!$db) {
    echo "Problem kod selektiranja baze podataka!";
    exit;
}
mysql_set_charset("utf-8", $dbc);    
    class sliderOffers {
        public $id;
        public $title;
        public $subtitle;
        public $sliderOfferBuy;
        public $sliderOfferDiscountU;
        public $sliderOfferDiscountP;
        public $sliderOfferDiscountV;
        public $sliderOfferBoughtT1;
        public $sliderOfferBoughtT2;
        public $sliderOfferBoughtVal;
        public $sliderOfferBoughtMax;
        public $sliderOfferTime;
        public $sliderOfferBoughtImg;
        
        function __construct($id,$title,$subtitle,$sliderOfferDiscountP,$sliderOfferDiscountV,$sliderOfferBoughtT1,
                                $sliderOfferBoughtT2,$sliderOfferBoughtVal,$sliderOfferBoughtMax,$sliderOfferTime){
            $this->id = ($id);
            $this->title = ($title);
            $this->subtitle = utf8_encode($subtitle);
            $this->sliderOfferDiscountV = ($sliderOfferDiscountV);
            $this->sliderOfferDiscountP = ($sliderOfferDiscountP);
            $this->sliderOfferBuy = $this->sliderOfferDiscountV*(100-$sliderOfferDiscountP)/100;
            $this->sliderOfferDiscountU = $this->sliderOfferDiscountV-$this->sliderOfferBuy;            
            $this->sliderOfferDiscountP = ($sliderOfferDiscountP.'%');
            $this->sliderOfferBuy = $this->sliderOfferBuy.' kn';
            $this->sliderOfferDiscountV = $this->sliderOfferDiscountV.' kn';
            $this->sliderOfferDiscountU = $this->sliderOfferDiscountU.' kn';
            $this->sliderOfferBoughtT1 = ($sliderOfferBoughtT1);
            $this->sliderOfferBoughtT2 = ($sliderOfferBoughtT2);
            $this->sliderOfferBoughtVal = ($sliderOfferBoughtVal);
            $this->sliderOfferBoughtMax = ($sliderOfferBoughtMax);
            $this->sliderOfferTime = ($sliderOfferTime);
            $this->sliderOfferBoughtImg = ('offers/ponuda_'.sprintf("%05d", $this->id).'/01.jpg');
            $this->convertToUtf8();
        }
        
        function convertToUtf8(){
            foreach ($this as $el)
                $el = 1;
        }
    }
    
    $offers = array();
    
    $query = "SELECT `p`.`id`, `p`.`naslov`,`p`.`podnaslov`,`p`.`cijena`,`a`.`popust`
                FROM `akcije` as `a`
                JOIN `ponude` as `p`
                ON `a`.`id_ponude`=`p`.`id`
                LIMIT 0, 4";
    $result = mysql_query($query);
    if (mysql_num_rows($result)) 
        while ($row = mysql_fetch_row($result)) 
            $offers[] = new sliderOffers($row[0],
                                        $row[1],
                                        $row[2],
                                        $row[4],
                                        $row[3],
                                        'Do sada kupljeno XY',
                                        'Potrebno još kupiti QW',
                                        '10',
                                        '100',
                                        '1 dan 15:45:30');
    print '<pre>';
    print_r($offers);
    print '</pre>';
    /*
    $xmlDoc = new DOMDocument();
    $root = $xmlDoc->appendChild($xmlDoc->createElement("RecentTutorials"));
    foreach ($offers as $offer){
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
    }
    header("Content-Type: text/plain");
    $xmlDoc->formatOutput = true;
    echo $xmlDoc->saveXML();
     */
?>