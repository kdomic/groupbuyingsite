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
        public $imagesPath;
        public $imagesList;
        public $shortDesc;
        public $desc;
        public $remark;
        public $x;
        public $y;
        
        public static function get($id)
        {
            $query  = 'SELECT a.id AS akcija, p.id AS ponuda, p.naslov, p.podnaslov, p.cijena, a.popust, ';
            $query .= '(SELECT sum(ra.kolicina) FROM racuni_akcije as ra WHERE ra.id_akcije=a.id GROUP BY ra.id_akcije ) as kupljeno, ';
            $query .= 'a.granica, a.datum_zavrsetka, p.opis_naslov, p.opis_kratki, p.opis, p.napomena, p.karta_x, p.karta_y ';
            $query .= 'FROM  akcije AS a ';
            $query .= 'JOIN ponude AS p ON a.id_ponude=p.id ';
            $query .= 'JOIN prodavatelji AS prod ON p.id_prodavatelja=prod.id ';
            $query .= 'WHERE ';
            $query .= 'a.aktivan=1 ';
            $query .= 'AND p.aktivan=1 ';
            $query .= 'AND prod.aktivan=1 ';
            $query .= 'ORDER BY a.istaknuto DESC, a.datum_zavrsetka ASC ';
            $query .= 'LIMIT 1 OFFSET '.$id;
            $data = DatabaseObject::find_by_raw_sql($query);
            if(empty($result_array)){
                //VRATI STATUS 0
            } else {
                $data = array_shift($data);
            }
            $xml = new XmlPonuda();
            $xml->id = array_shift($data[0]);
            $za_sluku = array_shift($data[0]);
            $xml->title = array_shift($data[0]);
            $xml->subtitle = array_shift($data[0]);
                $vrijednost = array_shift($data[0]);
                $popust = array_shift($data[0]);
                $cijena = $vrijednost*(100-$popust)/100;
                $usteda = $vrijednost - $cijena;
            $xml->sliderOfferBuy = str_replace('.', ',', sprintf("%01.2f", $cijena)).' kn';
            $xml->sliderOfferDiscountU = str_replace('.', ',', sprintf("%01.2f", $usteda)).' kn';
            $xml->sliderOfferDiscountP = $popust.'%';
            $xml->sliderOfferDiscountV = str_replace('.', ',', sprintf("%01.2f", $vrijednost)).' kn';
            $xml->sliderOfferBoughtVal = array_shift($data[0]);
            $xml->sliderOfferBoughtMax = array_shift($data[0]);

            if($xml->sliderOfferBoughtVal >= $xml->sliderOfferBoughtMax) {
                $this->sliderOfferBoughtT1 = 'Ponuda je postignuta!';
                $this->sliderOfferBoughtT2 = 'Do sada kupljeno '.$xml->sliderOfferBoughtVal;
            } else {
                $xml->sliderOfferBoughtT1 = 'Potrebno još {'.$xml->sliderOfferBoughtMax-$xml->sliderOfferBoughtVal.'} kupiti da bi vrijedilo';
                $xml->sliderOfferBoughtT2 = 'Do sada kupljeno '.$xml->sliderOfferBoughtVal;
            }
            $xml->sliderOfferTime = array_shift($data[0]);
            $xml->shortDesc = array_shift($data[0]);
            $xml->shortDesc .= array_shift($data[0]);
            $xml->desc = array_shift($data[0]);
            $xml->remark = array_shift($data[0]);
            $xml->x = array_shift($data[0]);
            $xml->y = array_shift($data[0]);                        
            $xml->sliderOfferBoughtImg = ('offers/ponuda_'.sprintf("%05d", $za_sluku).'/01.jpg');
            $xml->imgList($za_sluku);
            $xml->save();
        }
        
        function save(){
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("offers"));
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
            $offerTag->appendChild($xmlDoc->createElement("imagesPath", $this->imagesPath));
            $offerTag->appendChild($xmlDoc->createElement("imagesList", $this->imagesList));
            $offerTag->appendChild($xmlDoc->createElement("shortDesc", $this->shortDesc));
            $offerTag->appendChild($xmlDoc->createElement("desc", $this->desc));
            $offerTag->appendChild($xmlDoc->createElement("remark", $this->remark));
            $offerTag->appendChild($xmlDoc->createElement("x", $this->x));
            $offerTag->appendChild($xmlDoc->createElement("y", $this->y));

            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }

        function imgList($path){
            $this->imagesPath = 'offers/ponuda_'.sprintf("%05d", $path);
            $handle = opendir($this->imagesPath);
            while (false !== ($entry = readdir($handle)))
                if(strpos($entry,'.jpg'))
                    $this->imagesList .= $entry.";";
            closedir($handle);
        }              
    }    
?>