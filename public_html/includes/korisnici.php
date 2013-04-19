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
            public $id;
            public $ime;
            public $prezime;
            public $adresa;
            public $pbr;
            public $mjesto;
            public $telefon;
            public $email;
            public $oib;
            public $open_id;
            public $opomena;
            public $deaktiviran;
            public $zamrznut;
            public $blokiran;
            public $datum_registracije;
            public $email_potvrda;
            public $password;
            public $ovlasti;
            
            public static function find_by_email($id=0) {
                $result_array = self::find_by_sql("SELECT * FROM ".static::$table_name." WHERE email='{$id}' LIMIT 1");
                return !empty($result_array) ? array_shift($result_array) : false;
            }
    }
?>