<?php require_once('initialize.php'); ?>
<?php
    class Register {
        
        public $ime;
        public $prezime;
        public $email;
        public $lozinka;
        public $lozinka2;
        public $uvjeti;
        
        function __construct(){
            $data = json_decode(stripslashes($_POST['data']));
            $this->ime = $data[0];
            $this->prezime = $data[1];
            $this->email = $data[2];
            $this->lozinka = $data[3];
            $this->lozinka2 = $data[4];
            $this->uvjeti = $data[5];
            echo $this->ime;
        }
    }    
    $reg = new Register();
?>
