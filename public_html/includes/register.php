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
            if($data[6]!=$_SESSION['captcha']){
                xmlStatusSend(-1);
                return;
            }
            $emailPattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
            preg_match($emailPattern, $this->email, $eamilOK);
            if(isset($data[7])){
                if(strlen($this->ime)<3 || strlen($this->prezime)<3 || strlen($this->email)<3 || strlen($this->lozinka)<3 || !$eamilOK || !$this->uvjeti || $this->lozinka!=$this->lozinka)
                    xmlStatusSend(0);
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
            $korisnik->datum_registracije = Vrijeme::nowWithOffset();
            $korisnik->email_potvrda = $this->emailConfirm();
            $korisnik->ovlasti = 1;
            $status = $korisnik->save();
            Logovi::logoviOp('1',$korisnik->id);
            xmlStatusSend($status);
        }
        
        function emailCheck(){
            $check = Korisnici::find_by_email($this->email);
            //Logovi::logoviOp('2',ID_KORISNIKA);
            xmlStatusSend($check ? "1":"0");
        }
        
        function emailConfirm(){
            return 0;
        }
        
    }    
    $reg = new Register();
?>
