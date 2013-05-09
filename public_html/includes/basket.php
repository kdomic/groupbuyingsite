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
				case 4:
					$this->getTotal();
					break;					
			}			
		}

		public function add($value='')
		{
			if (isset($_SESSION['basket']))
				$_SESSION['basket'] .= $value.';';
			else
				$_SESSION['basket'] = $value.';';
			Kosarica::kosaricaOp($value,'1');
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
			$racun->datum = Vrijeme::nowWithOffset();
			$racun->placeno = 1;
			$racun->save();
			$data = explode(';', $_SESSION['basket']);
			array_pop($data);
			foreach ($data as $d) {
				Kosarica::kosaricaOp((int)$d,'2');
				$racun_akcije = new Racuni_akcije();
				$racun_akcije->id_racuna = $racun->id;
				$racun_akcije->id_akcije = (int)$d;
				$racun_akcije->kolicina = 1;
				$racun_akcije->save();
			}
			unset($_SESSION['basket']);
			xmlStatusSend(1);
		}

		public function getTotal(){
			$data = explode(';', $_SESSION['basket']);
			array_pop($data);
			$suma = 0.00;
			foreach ($data as $d) {
				$id_akcije = (int)$d;
				$a = Akcije::find_by_id($id_akcije);
				$p = Ponude::find_by_id($a->id_ponude);
				$suma += $p->cijena-$p->cijena*$a->popust/100;
			}
			if($suma == 0.00)
				xmlStatusSend('0');
			else
				xmlStatusSend( str_replace('.', ',', sprintf("%01.2f", $suma)) );
		}

	}

	$basket = new Basket();
?>