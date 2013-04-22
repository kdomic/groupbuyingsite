<?php require_once('initialize.php'); ?>
<?php
	/*	Procedure
			['0']				data[0]==0 - return items
			['1','offerNum']	data[0]==1 - add item 
			['2','offerNum']	data[0]==2 - remove
			['3']				data[0]==3 - save basket as purchased
	*/
	class Basket
	{
		
		public $items;
		public $status;

		function __construct()
		{
			$this->status = 0;
			$data = json_decode(stripslashes($_POST['data']));
			switch ((int)$data[0]) {
				case 1:
					$this->add($data[1]);
					break;
				case 2:
					$this->remove($data[1]);
					break;
				case 3:
					$this->save();
					break;
			}
			$this->show();
		}

		public function add($value='')
		{
			if (isset($_SESSION['basket']))
				$_SESSION['basket'] .= $value.';';
			else
				$_SESSION['basket'] = $value.';';
		}		

		public function remove($value='')
		{
			if (isset($_SESSION['basket'])){
				$data = explode(';', $_SESSION['basket']);
				$new_data = '';
				foreach ($data as $d) {
					if((int)$d===(int)$value || $d==='') continue;
					else $new_data .= $d.';';
				}
    			$_SESSION['basket'] = $new_data;
			}				
			else
				xmlStatusSend(0);
		}

		public function save()
		{
			$this->status = 0;
			if(!isset($_SESSION['basket'])) return;
			$racun = new Racuni();
			$racun->id_korisnika = Session::getCurrentUser();
			$racun->datum = date("Y-m-d H:i:s");
			$racun->placeno = 1;
			$racun->save();			
			$this->status = 1;
			unset($_SESSION['basket']);			
		}

		public function show()
		{
			if (isset($_SESSION['basket']))
				xmlStatusSend($_SESSION['basket']);
			else				
				xmlStatusSend($this->status);
		}

	}

	$basket = new Basket();
?>