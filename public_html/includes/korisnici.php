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
                                            'username',
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
            public $username;
            public $password;
            public $ovlasti;
    }
?>