<?php require_once('initialize.php'); ?>
<?php
    class XmlPonuda {
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
        
        function __construct($num) {
            $ponuda = Ponude::find_by_id($num);            
            $this->testdata($ponuda);            
            $this->save();
        }
        
        function save(){
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("RecentTutorials"));
            $offerTag = $root->appendChild($xmlDoc->createElement("offer"));
            $offerTag->appendChild($xmlDoc->createAttribute("id"))->appendChild($xmlDoc->createTextNode($this->id));
            $offerTag->appendChild($xmlDoc->createElement("id", $this->id));
            $offerTag->appendChild($xmlDoc->createElement("title", $this->title));
            $offerTag->appendChild($xmlDoc->createElement("subtitle", $this->subtitle));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferBuy", $this->sliderOfferBuy));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferDiscountU", $this->sliderOfferDiscountU));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferDiscountP", $this->sliderOfferDiscountP));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferDiscountV", $this->sliderOfferDiscountV));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtT1", $this->sliderOfferBoughtT1));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtT2", $this->sliderOfferBoughtT2));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtVal", $this->sliderOfferBoughtVal));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtMax", $this->sliderOfferBoughtMax));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferTime", $this->sliderOfferTime));        
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtImg", $this->sliderOfferBoughtImg));
            header("Content-Type: text/plain");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }
        
        function testdata($ponuda){
            $vrijednost = rand()%1000+200;
            $popust = rand()%80+1;
            $cijena = $vrijednost*(100-$popust)/100;
            $usteda = $vrijednost - $cijena;
            $this->id = $ponuda->id;
            $this->title = $ponuda->naslov;
            $this->subtitle = $ponuda->podnaslov;
            $this->sliderOfferBuy = str_replace('.', ',', sprintf("%01.2f", $cijena)).'';
            $this->sliderOfferDiscountU = str_replace('.', ',', sprintf("%01.2f", $usteda)).'';
            $this->sliderOfferDiscountP = $popust.'%';
            $this->sliderOfferDiscountV = str_replace('.', ',', sprintf("%01.2f", $vrijednost)).' kn';
            $this->sliderOfferBoughtT1 = 'Potrebno još 5 kupiti';
            $this->sliderOfferBoughtT2 = 'Do sada kupljeno 95';
            $this->sliderOfferBoughtVal = rand()%101;
            $this->sliderOfferBoughtMax = '100';
            $this->sliderOfferTime = '125 dana 12:18:49';
            $this->sliderOfferBoughtImg = ('offers/ponuda_'.sprintf("%05d", $this->id).'/01.jpg');  
        }                
    }    
?>