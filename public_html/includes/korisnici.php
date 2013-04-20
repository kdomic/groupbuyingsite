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
                                            'ovlasti');
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
    }
?>