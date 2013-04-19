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
            if(isset($data[6])){
                if(!strlen($this->ime) || !strlen($this->prezime) || !strlen($this->email) || !strlen($this->lozinka) || !$this->uvjeti || $this->lozinka!=$this->lozinka)
                    $this->xml(0);
                else
                    $this->register();
            } 
            else $this->emailCheck();
        }
        
        function register(){
            $status = 0;
            $korisnik = new Korisnici();
            $korisnik->ime = $this->ime;
            $korisnik->prezime = $this->prezime;
            $korisnik->email = $this->email;
            $korisnik->password = sha1($this->lozinka);
            $korisnik->datum_registracije = date("Y-m-d H:i:s");
            $korisnik->email_potvrda = $this->emailConfirm();
            $korisnik->ovlasti = 1;
            $status = $korisnik->save();
            $this->xml($status);
        }
        
        function emailCheck(){
            $check = Korisnici::find_by_email($this->email);
            $this->xml($check ? "1":"0");
        }

        function xml($status){
            $xmlDoc = new DOMDocument();
            $root = $xmlDoc->appendChild($xmlDoc->createElement("email"));
            $root->appendChild($xmlDoc->createElement("status", $status));
            header("Content-Type: text/xml");
            $xmlDoc->formatOutput = true;
            echo $xmlDoc->saveXML();
        }
        
        function emailConfirm(){
            return 0;
        }
        
    }    
    $reg = new Register();
?>
