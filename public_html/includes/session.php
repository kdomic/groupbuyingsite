<?php require_once('initialize.php'); ?>
<?php
	/*	Procedure
			['1',email,password]	data[0]==1 - login 
			['2']					data[0]==2 - checkLogin 
	*/
	class Session
	{
		public $user_id;

		function __construct()
		{
			$this->check_login();
			$data = json_decode(stripslashes($_POST['data']));			
			switch ((int)$data[0]) {
				case 1:
					$korisnik = Korisnici::authenticate($data[1],$data[2]);
					if($korisnik){
						$this->login($korisnik);
						xmlStatusSend(1);
					} else {
						xmlStatusSend(0);
					}
					break;
				case 2:
					xmlStatusSend($this->user_id);
					break;
			}
		}

		public function login($user)
		{
			if($user)
				$this->user_id = $_SESSION['user_id'] = $user->id;
		}

		public function logout()
		{
			unset($_SESSION['user_id']);
			$this->user_id = 0;
		}

		public function check_login()
		{
			if(isset($_SESSION['user_id']))
				$this->user_id = $_SESSION['user_id'];
			else
				$this->user_id = 0;
		}

	}
	$sessione = new Session();

?>