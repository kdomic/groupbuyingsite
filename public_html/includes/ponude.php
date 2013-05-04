<?php require_once('initialize.php'); ?>
<?php

    class Ponude extends DatabaseObject {
        protected static $table_name = "ponude";
        protected static $db_fields = array('id',
                                            'id_prodavatelja',
                                            'id_kategorije',
                                            'naslov',
                                            'podnaslov',
                                            'cijena',
                                            'opis_naslov',
                                            'opis_kratki',
                                            'opis',
                                            'napomena',
                                            'karta_x',
                                            'karta_y',
                                            'aktivan');
        public $id;
        public $id_prodavatelja;
        public $id_kategorije;
        public $naslov;
        public $podnaslov;
        public $cijena;
        public $opis_naslov;
        public $opis_kratki;
        public $opis;
        public $napomena;
        public $karta_x;
        public $karta_y;
        public $aktivan;

        public $imagesPath;
        public $imagesList;

        public static function getAll($data){
            $_d = self::find_all();            
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("ponude"));
            foreach ($_d as $d){                
                $prodavatelj = Prodavatelji::find_by_id($d->id_prodavatelja);
                $kategorija = Kategorije::find_by_id($d->id_kategorije);
                $d->id_prodavatelja = $prodavatelj->naziv ;
                $d->id_kategorije = $kategorija->naziv;
                $d->aktivan = $d->aktivan==1 ? "Da" : "Ne";
                //if(isset($data[1]))
                    //if(!$d->aktivan || !$kategorija->aktivan || !$prodavatelj->aktivan)
                        //continue;
                $data = $root->appendChild($xmlDoc->createElement("ponuda"));
                foreach ($d as $key => $value) {
                    $data->appendChild($xmlDoc->createElement($key, toUtf8($value)));
                }
            }
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }

        public static function get($id){
            $p = self::find_by_id($id);
            $p->imgList();
            $path = getcwd().'/offers/ponuda_'.sprintf("%05d", $p->id).'/';
            $_SESSION['imgPath'] = $path; 
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("ponude"));
            $ponuda = $root->appendChild($xmlDoc->createElement("ponuda"));
            foreach ($p as $key => $value) {
                $ponuda->appendChild($xmlDoc->createElement($key, toUtf8($value)));
            }

            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }

        public static function set($data){               
            $p = new Ponude();
            if((int)$data[0]===4) $p = self::find_by_id($data[1]);            
            $p->aktivan = array_pop($data);
            $p->karta_y = array_pop($data);
            $p->karta_x = array_pop($data);
            $p->napomena = array_pop($data);
            $p->opis = array_pop($data);
            $p->opis_kratki = array_pop($data);
            $p->opis_naslov = array_pop($data);
            $p->cijena = array_pop($data);
            $p->podnaslov = array_pop($data);
            $p->naslov = array_pop($data);
            $p->id_kategorije = array_pop($data);
            $p->id_prodavatelja = array_pop($data);            
            xmlStatusSend($p->save());            
            $path = getcwd().'/offers/ponuda_'.sprintf("%05d", $p->id).'/'; 
            $_SESSION['imgPath'] = $path;                            
            if((int)$data[0]===3){
                mkdir($path,0777,true);
            }
        }

        function imgList(){
            $this->imagesPath = 'offers/ponuda_'.sprintf("%05d", $this->id);
            $handle = opendir($this->imagesPath);
            while (false !== ($entry = readdir($handle)))
                if(strpos($entry,'.jpg'))
                    $this->imagesList .= $entry.";";
            closedir($handle);
        } 

        public static function removeImg($img){
            $x = explode("/", $img);
            $pic = array_pop($x);
            $folder = array_pop($x);            
            $path = getcwd().'/offers/'.$folder.'/'.$pic;
            print_r($path);
            xmlStatusSend(unlink($path));
        }

    } 
?>