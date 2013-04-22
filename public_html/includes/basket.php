<?php require_once('initialize.php'); ?>
<?php
	/*	Procedure
			['0']				data[0]==1 - return items
			['1','offerNum']	data[0]==1 - add item 
			['2','offerNum']	data[0]==2 - remove
			['3']				data[0]==3 - save basket as purchased			
	*/
	class Basket
	{
		
		public $items;

		function __construct()
		{
			$data = json_decode(stripslashes($_POST['data']));
			switch ((int)$data[0]) {
				case 0:
					$this->show();
					break;
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

		public function show()
		{
			if (isset($_SESSION['basket']))
				xmlStatusSend($_SESSION['basket']);
			else
				xmlStatusSend(0);
		}

		public function save()
		{
			$this->status = 0;
			if(!isset($_SESSION['basket']) || !$_SESSION['user_id']) return;
			$racun = new Racuni();
			$racun->id_korisnika = $_SESSION['user_id'];
			$racun->datum = date("Y-m-d H:i:s");
			$racun->placeno = 1;
			$racun->save();
			$data = explode(';', $_SESSION['basket']);
			array_pop($data);
			foreach ($data as $d) {
				$racun_akcije = new Racuni_akcije();
				$racun_akcije->id_racuna = $racun->id;
				$racun_akcije->id_akcije = (int)$d;
				$racun_akcije->kolicina = 1;
				$racun_akcije->save();
			}
			unset($_SESSION['basket']);
			xmlStatusSend(1);
		}	

	}

	$basket = new Basket();
?>