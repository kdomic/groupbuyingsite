<?php require_once('initialize.php'); ?>
<?php
	/*	Procedure
			['1',email,password]	data[0]==1 - login 
			['2']					data[0]==2 - checkLogin
			['3'] 					data[0]==3 - logout
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
					$korisnik = Korisnici::authenticate($data[1],$data[2]); //
					if($korisnik){
						if($korisnik->aktivan==0)
							xmlStatusSend(2);
						else if($korisnik->deaktiviran==1)
							xmlStatusSend(3);
						else if($korisnik->zamrznut!='0000-00-00 00:00:00' && Vrijeme::remainingTimeWithOffset($korisnik->zamrznut)!='Kupnja je zatvorena' )
							xmlStatusSend(     Vrijeme::remainingTimeWithOffset($korisnik->zamrznut)    );
						else {
							$this->login($korisnik);
							xmlStatusSend(1);
						}
					} else {
						if(isset($_SESSION['login_error']))
							$_SESSION['login_error']++;
						else
							$_SESSION['login_error'] = 1;
						if($_SESSION['login_error']>2){
							$k = Korisnici::find_by_email($data[1]);
							if($k){
								$k->aktivan = 0;
								$k->save();
								xmlStatusSend(2);
								return;
							}
						}							
						xmlStatusSend(0);
					}
					break;
				case 2:
					xmlStatusSend($this->user_id);
					break;
				case 3:
					xmlStatusSend($this->logout());
					break;
			}
		}

		public function login($user)
		{
			if($user){
				if(isset($_SESSION['login_error'])) unset($_SESSION['login_error']);
				$this->user_id = $_SESSION['user_id'] = $user->id;
				$this->clearBasket();
                Logovi::logoviOp('5',$_SESSION['user_id']);				
			}
		}

		public function logout()
		{
			Logovi::logoviOp('6',$_SESSION['user_id']);
			unset($_SESSION['user_id']);
			$this->user_id = 0;
			$this->clearBasket();			
			session_destroy();
			return 1;
		}

		public function check_login()
		{
			if(isset($_SESSION['user_id']))
				$this->user_id = $_SESSION['user_id'];
			else
				$this->user_id = 0;
		}

		public function clearBasket()
		{
			if(isset($_SESSION['basket']))
				unset($_SESSION['basket']);
		}

	}
	$sessione = new Session();

?>