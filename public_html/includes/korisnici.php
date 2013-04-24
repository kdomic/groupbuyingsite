<?php
    require_once('initialize.php');
    
    class Korisnici extends DatabaseObject {
        protected static $table_name = "korisnici";
        protected static $db_fields = array('id',
                                            'ime',
                                            'prezime',
                                            'adresa',
                                            'pbr',
                                            'mjesto',
                                            'telefon',
                                            'email',
                                            'oib',
                                            'open_id',
                                            'opomena',
                                            'deaktiviran',
                                            'zamrznut',
                                            'blokiran',
                                            'datum_registracije',
                                            'email_potvrda',
                                            'password',
                                            'ovlasti',
                                            'aktivan');
            public $id;                 //[0]
            public $ime;                //[1]
            public $prezime;            //[2]
            public $adresa;             //[3]
            public $pbr;                //[4]
            public $mjesto;             //[5]
            public $telefon;            //[6]
            public $email;              //[7]
            public $oib;                //[8]
            public $open_id;            //[9]
            public $opomena;            //[10]
            public $deaktiviran;        //[11]
            public $zamrznut;           //[12]
            public $blokiran;           //[13]
            public $datum_registracije; //[14]
            public $email_potvrda;      //[15]
            public $password;           //[16]
            public $ovlasti;            //[17]
            public $aktivan;            //[18]
            
            public static function find_by_email($id=0) {
                $result_array = self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE email='{$id}' LIMIT 1");
                return !empty($result_array) ? array_shift($result_array) : false;
            }

            public static function authenticate($email=0,$pass=0) {
                $pass = sha1($pass);
                $result_array = self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE email='{$email}' LIMIT 1");
                $user = array_shift($result_array);
                return $pass===$user->password ? $user : false;
            }

            public static function find_by_credential() {
                return self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE ovlasti>1");
            }

            public static function getAll($ovlasti=NULL) //1
            {
                $_d = self::find_all();
                $xmlDoc = new DOMDocument();
                $root = $xmlDoc->appendChild($xmlDoc->createElement("korisnici"));
                foreach ($_d as $d){
                    if($ovlasti!=NULL)
                        if((int)$d->ovlasti!=$ovlasti) continue;
                    $data = $root->appendChild($xmlDoc->createElement("korisnik"));
                    $d->aktivan = $d->aktivan==1 ? "Da" : "Ne";
                    foreach ($d as $key => $value) {
                        $data->appendChild($xmlDoc->createElement($key, htmlentities($value)));
                    }
                }
                header("Content-Type: text/xml");
                $xmlDoc->formatOutput = true;
                echo $xmlDoc->saveXML();
            }

            public static function get($id) //2
            {
                $d = self::find_by_id($id);
                $xmlDoc = new DOMDocument();
                $root = $xmlDoc->appendChild($xmlDoc->createElement("korisnici"));
                $data = $root->appendChild($xmlDoc->createElement("korisnik"));
                $d->aktivan = $d->aktivan==1 ? "Da" : "Ne";
                foreach ($d as $key => $value) {
                    $data->appendChild($xmlDoc->createElement($key, htmlentities($value)));
                }
                header("Content-Type: text/xml");
                $xmlDoc->formatOutput = true;
                echo $xmlDoc->saveXML();
            }

            public static function set($data) //3,4
            {
                $p = new Korisnici();
                if((int)$data[0]===4) $p = self::find_by_id($data[1]);            
                $p->aktivan = array_pop($data);
                $k->ovlasti = array_pop($data);
                $newPass= array_pop($data);
                $k->password = is_sha1($newPass) ? $newPass : sha1($newPass);
                $k->email_potvrda = array_pop($data);
                $k->datum_registracije = array_pop($data);
                $k->blokiran = array_pop($data);
                $k->zamrznut = array_pop($data);
                $k->deaktiviran = array_pop($data);
                $k->opomena = array_pop($data);
                $k->open_id = array_pop($data);
                $k->oib = array_pop($data);
                $k->email = array_pop($data);
                $k->telefon = array_pop($data);
                $k->mjesto = array_pop($data);
                $k->pbr = array_pop($data);
                $k->adresa = array_pop($data);
                $k->prezime = array_pop($data);
                $k->ime = array_pop($data);
                xmlStatusSend($p->save());
            }

            public static function getByEmail($email) //5
            {
                $d = self::find_by_email($email);
                if(!$d) xmlStatusSend(0);
                else self::get($d->id);
            }

    }
?>