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
                                            'deaktiviran',
                                            'zamrznut',
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
            public $deaktiviran;        //[10]
            public $zamrznut;           //[11]
            public $datum_registracije; //[12]
            public $email_potvrda;      //[13]
            public $password;           //[14]
            public $ovlasti;            //[15]
            public $aktivan;            //[16]
            
            public static function find_by_email($id=0) {
                $result_array = self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE email='{$id}' LIMIT 1");
                return !empty($result_array) ? array_shift($result_array) : false;
            }

            public static function find_by_potvrda($id=0) {
                $result_array = self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE email_potvrda='{$id}' LIMIT 1");
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
                    switch($d->ovlasti){
                        case 1: $d->ovlasti = "Korisnik"; break;
                        case 2: $d->ovlasti = "Mod"; break;
                        case 3: $d->ovlasti = "Admin"; break;                        
                    }
                    $d->zamrznut = timeForScreenLong($d->zamrznut) ? : "Nije";
                    $d->deaktiviran = $d->deaktiviran==1 ? "Da" : "Ne";                    
                    $d->aktivan = $d->aktivan==1 ? "Da" : "Ne";
                    foreach ($d as $key => $value) {
                        $data->appendChild($xmlDoc->createElement($key, toUtf8($value)));
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
                $d->datum_registracije = timeForScreenLong($d->datum_registracije);                
                foreach ($d as $key => $value) {
                    $data->appendChild($xmlDoc->createElement($key, toUtf8($value)));
                }
                header("Content-Type: text/xml");
                $xmlDoc->formatOutput = true;
                echo $xmlDoc->saveXML();
            }

            public static function set($data) //3,4
            {                
                $d = new Korisnici();
                $ovlast = -1;
                if((int)$data[0]===4){ 
                    $d = self::find_by_id($data[1]);
                    $ovlast = $d->ovlasti;
                }
                $d->aktivan = array_pop($data);
                $d->ovlasti = array_pop($data);
                $newPass= array_pop($data);
                $d->password = is_sha1($newPass) ? $newPass : sha1($newPass);
                $d->email_potvrda = array_pop($data);
                $d->datum_registracije = array_pop($data)=='' ? Vrijeme::nowWithOffset() : timeForMysql($d->datum_registracije);
                $d->zamrznut = array_pop($data);
                $d->deaktiviran = array_pop($data);
                $d->open_id = array_pop($data);
                $d->oib = array_pop($data);
                $d->email = array_pop($data);
                $d->telefon = array_pop($data);
                $d->mjesto = array_pop($data);
                $d->pbr = array_pop($data);
                $d->adresa = array_pop($data);
                $d->prezime = array_pop($data);
                $d->ime = array_pop($data);
                xmlStatusSend($d->save());
                Logovi::logoviOp('3',$d->id);
                if($ovlast!=$d->ovlasti && $ovlast>=0)
                    Logovi::logoviOp('4',$d->id);

            }

            public static function getByEmail($email) //5
            {
                $d = self::find_by_email($email);
                if(!$d) xmlStatusSend(0);
                else self::get($d->id);
            }

            public static function currentUserCredentials(){
                if(isset($_SESSION['user_id'])){
                    $d = self::find_by_id($_SESSION['user_id']);
                    if(!$d) xmlStatusSend(0);
                    else xmlStatusSend($d->ovlasti);
                } else {
                    xmlStatusSend(0);
                }                
            }

            public static function currentUserCredentialsValue(){
                if(isset($_SESSION['user_id'])){
                    $d = self::find_by_id($_SESSION['user_id']);
                    if(!$d) return 0;
                    else  return $d->ovlasti;
                }
                return 0;
            }

            public static function lastBoughtCat($id=''){
                $query  = 'SELECT p.id_kategorije ';
                $query  .= 'FROM racuni AS r ';
                $query  .= 'JOIN racuni_akcije AS ra ON ra.id_racuna=r.id ';
                $query  .= 'JOIN akcije AS a ON a.id=ra.id_akcije ';
                $query  .= 'JOIN ponude AS p ON p.id=a.id_ponude ';
                $query  .= 'WHERE r.id_korisnika='.$id;
                $query  .= ' ORDER BY r.datum DESC ';
                $query  .= 'LIMIT 1 ';
                $data = DatabaseObject::find_by_raw_sql($query);
                if($data)
                    xmlStatusSend(array_shift($data[0]));
                else
                    xmlStatusSend(0);
            }


    }
?>