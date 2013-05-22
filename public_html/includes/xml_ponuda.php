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
        public $category;
        public $sellerNaziv;
        public $sellerAdresa;
        public $sellerKontakt;
        public $sellerInfo;
        
        public static function count($protocolData)
        {
            $query  = 'SELECT count(*) ';
            $query .= 'FROM  akcije AS a ';
            $query .= 'JOIN ponude AS p ON a.id_ponude=p.id ';
            $query .= 'JOIN prodavatelji AS prod ON p.id_prodavatelja=prod.id ';
            $query .= 'JOIN kategorije AS k ON p.id_kategorije=k.id ';
            if($protocolData[6]==1 && $protocolData[4]!=''){
                $query .= 'JOIN gradovi_akcije AS ga ON ga.id_akcije=a.id ';             
            }           
            $query .= 'WHERE ';
            $query .= 'a.aktivan=1 ';
            $query .= 'AND p.aktivan=1 ';
            $query .= 'AND prod.aktivan=1 ';
            $query .= 'AND a.datum_pocetka <= "'.Vrijeme::nowWithOffset().'" ';
            $query .= 'AND a.datum_zavrsetka > "'.Vrijeme::nowWithOffset().'" ';
            if($protocolData[6]==1 && $protocolData[3]!=''){ 
                $query .= 'AND (p.naslov LIKE "%'.$protocolData[3].'%" ';
                $query .= 'OR p.podnaslov LIKE "%'.$protocolData[3].'%" ';
                $query .= 'OR k.naziv LIKE "%'.$protocolData[3].'%") ';
            }
            if($protocolData[6]==1 && $protocolData[4]!=''){ 
                $query .= 'AND ga.id_grada='.$protocolData[4].' ';
            }
            if($protocolData[6]==1 && $protocolData[5]!=''){ 
                $query .= 'AND k.id='.$protocolData[5].' ';
            }
            $data = DatabaseObject::find_by_raw_sql($query);
            xmlStatusSend(array_shift($data[0]));
        }

        public static function get($protocolData)
        {            
            $id = (int)$protocolData[1];
            $idOrg = $id;
            $query  = 'SELECT a.id AS akcija, p.id AS ponuda, p.naslov, p.podnaslov, p.cijena, a.popust, ';
            $query .= '(SELECT sum(ra.kolicina) FROM racuni_akcije as ra WHERE ra.id_akcije=a.id GROUP BY ra.id_akcije ) as kupljeno, ';
            $query .= 'a.granica, a.datum_zavrsetka, p.opis_naslov, p.opis_kratki, p.opis, p.napomena, p.karta_x, p.karta_y, k.id, ';
            $query .= 'prod.naziv, prod.adresa, prod.kontakt, prod.info ';
            $query .= 'FROM  akcije AS a ';
            $query .= 'JOIN ponude AS p ON a.id_ponude=p.id ';
            $query .= 'JOIN prodavatelji AS prod ON p.id_prodavatelja=prod.id ';
            $query .= 'JOIN kategorije AS k ON p.id_kategorije=k.id ';
            if($protocolData[6]==1 && $protocolData[4]!=''){
                $query .= 'JOIN gradovi_akcije AS ga ON ga.id_akcije=a.id ';             
            }                                                         
            $query .= 'WHERE ';
            $query .= 'a.aktivan=1 ';
            $query .= 'AND p.aktivan=1 ';
            $query .= 'AND prod.aktivan=1 ';
            if($id<0){
                $id *= (-1);
                $query .= 'AND a.id='.$id;
            } else {
                $query .= 'AND a.datum_pocetka <= "'.Vrijeme::nowWithOffset().'" ';
                $query .= 'AND a.datum_zavrsetka > "'.Vrijeme::nowWithOffset().'" ';
                //$query .= 'AND a.datum_pocetka <= now() ';
                //$query .= 'AND a.datum_zavrsetka > now() ';
                if($protocolData[6]==1 && $protocolData[3]!=''){ 
                    $query .= 'AND (p.naslov LIKE "%'.$protocolData[3].'%" ';
                    $query .= 'OR p.podnaslov LIKE "%'.$protocolData[3].'%" ';
                    $query .= 'OR k.naziv LIKE "%'.$protocolData[3].'%") ';
                }
                if($protocolData[6]==1 && $protocolData[4]!=''){ 
                    $query .= 'AND ga.id_grada='.$protocolData[4].' ';
                }
                if($protocolData[6]==1 && $protocolData[5]!=''){ 
                    $query .= 'AND k.id='.$protocolData[5].' ';
                }                
                $query .= 'ORDER BY a.istaknuto DESC, a.datum_zavrsetka ASC ';
                $query .= 'LIMIT 1 OFFSET '.$id;
            }            
            $data = DatabaseObject::find_by_raw_sql($query);
            if(empty($data)){
                xmlStatusSend(0);
                return;
            }
            $xml = new XmlPonuda();
            $xml->id = array_shift($data[0]);
            if($idOrg>0 && in_array($xml->id , explode(";", $protocolData[2])) && (int)$protocolData[7]==0){
                $protocolData[1]--;
                if($protocolData[1]<1) return;
                self::get($protocolData);
                return;
            }
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
            $xml->sliderOfferBoughtVal = isset($xml->sliderOfferBoughtVal) ? $xml->sliderOfferBoughtVal : 0;        
            if($xml->sliderOfferBoughtVal >= $xml->sliderOfferBoughtMax) {
                $xml->sliderOfferBoughtT1 = 'Ponuda je postignuta!';
                $xml->sliderOfferBoughtT2 = 'Do sada kupljeno '.$xml->sliderOfferBoughtVal;
            } else {
                $xml->sliderOfferBoughtT1 = 'Potrebno još '.($xml->sliderOfferBoughtMax-$xml->sliderOfferBoughtVal);
                $xml->sliderOfferBoughtT2 = 'Do sada kupljeno '.$xml->sliderOfferBoughtVal;
            }
            $xml->sliderOfferTime = array_shift($data[0]);
            //$xml->sliderOfferTime = Vrijeme::timeWithOffset($xml->sliderOfferTime);
            //$xml->sliderOfferTime = Vrijeme::remainingTime($xml->sliderOfferTime);
            $xml->sliderOfferTime = Vrijeme::remainingTimeWithOffset($xml->sliderOfferTime);
            $xml->shortDesc = array_shift($data[0]);
            $xml->shortDesc .= '<p>'.array_shift($data[0]).'</p>';
            $xml->desc = array_shift($data[0]);
            $xml->remark = array_shift($data[0]);
            $xml->x = array_shift($data[0]);
            $xml->y = array_shift($data[0]);                        
            $xml->sliderOfferBoughtImg = ('offers/ponuda_'.sprintf("%05d", $za_sluku).'/01.jpg');
            $xml->imgList($za_sluku);
            $xml->category = array_shift($data[0]);
            $xml->sellerNaziv = array_shift($data[0]);
            $xml->sellerAdresa = array_shift($data[0]);
            $xml->sellerKontakt = array_shift($data[0]);
            $xml->sellerInfo = array_shift($data[0]);
            $xml->save();            
        }
        
        function save(){
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("offers"));
            $offerTag = $root->appendChild($xmlDoc->createElement("offer"));
            $offerTag->appendChild($xmlDoc->createAttribute("id"))->appendChild($xmlDoc->createTextNode($this->id));
            $offerTag->appendChild($xmlDoc->createElement("id", $this->id));
            $offerTag->appendChild($xmlDoc->createElement("title", toUtf8($this->title)));
            $offerTag->appendChild($xmlDoc->createElement("subtitle", toUtf8($this->subtitle)));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferBuy", toUtf8($this->sliderOfferBuy)));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferDiscountU", toUtf8($this->sliderOfferDiscountU)));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferDiscountP", toUtf8($this->sliderOfferDiscountP)));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferDiscountV", toUtf8($this->sliderOfferDiscountV)));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtT1", toUtf8($this->sliderOfferBoughtT1)));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtT2", toUtf8($this->sliderOfferBoughtT2)));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtVal", toUtf8($this->sliderOfferBoughtVal)));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtMax", toUtf8($this->sliderOfferBoughtMax)));
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferTime", toUtf8($this->sliderOfferTime)));        
            $offerTag->appendChild($xmlDoc->createElement("sliderOfferBoughtImg", toUtf8($this->sliderOfferBoughtImg)));
            $offerTag->appendChild($xmlDoc->createElement("imagesPath", toUtf8($this->imagesPath)));
            $offerTag->appendChild($xmlDoc->createElement("imagesList", toUtf8($this->imagesList)));
            $offerTag->appendChild($xmlDoc->createElement("shortDesc", toUtf8($this->shortDesc)));
            $offerTag->appendChild($xmlDoc->createElement("desc", toUtf8($this->desc)));
            $offerTag->appendChild($xmlDoc->createElement("remark", toUtf8($this->remark)));
            $offerTag->appendChild($xmlDoc->createElement("x", toUtf8($this->x)));
            $offerTag->appendChild($xmlDoc->createElement("y", toUtf8($this->y)));
            $offerTag->appendChild($xmlDoc->createElement("category", toUtf8($this->category)));
            $offerTag->appendChild($xmlDoc->createElement("sellerNaziv", toUtf8($this->sellerNaziv)));            
            $offerTag->appendChild($xmlDoc->createElement("sellerAdresa", toUtf8($this->sellerAdresa)));            
            $offerTag->appendChild($xmlDoc->createElement("sellerKontakt", toUtf8($this->sellerKontakt)));            
            $offerTag->appendChild($xmlDoc->createElement("sellerInfo", toUtf8($this->sellerInfo)));            

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