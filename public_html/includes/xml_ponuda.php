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
        
        function __construct() {
            $vrijednost = 1512;
            $popust = 50;
            $cijena = $vrijednost*(100-$popust)/100;
            $usteda = $vrijednost - $cijena;
            $this->id = '15';
            $this->title = 'Ostvarite san i vozite Ferrari na pisti u Italiji';
            $this->subtitle = 'Dok muškarci iskušavaju nezaboravan osjećaj vožnje Ferrarija ili Lamborghinija na stazi kod Udina, žene mogu uživati u shoppingu';
            $this->sliderOfferBuy = str_replace('.', ',', sprintf("%01.2f", $cijena)).'';
            $this->sliderOfferDiscountU = str_replace('.', ',', sprintf("%01.2f", $usteda)).'';
            $this->sliderOfferDiscountP = $popust.'%';
            $this->sliderOfferDiscountV = str_replace('.', ',', sprintf("%01.2f", $vrijednost)).' kn';
            $this->sliderOfferBoughtT1 = 'Potrebno još 5 kupiti';
            $this->sliderOfferBoughtT2 = 'Do sada kupljeno 95';
            $this->sliderOfferBoughtVal = '95';
            $this->sliderOfferBoughtMax = '100';
            $this->sliderOfferTime = '125 dana 12:18:49';
            $this->sliderOfferBoughtImg = ('offers/ponuda_'.sprintf("%05d", $this->id).'/01.jpg');
        }
        
    }
?>