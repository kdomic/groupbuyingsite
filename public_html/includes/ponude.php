<?php
    require_once('initialize.php');
    
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
                                            'karta_y');
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
    }
?>