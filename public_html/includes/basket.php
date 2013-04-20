<?php require_once('initialize.php'); ?>
<?php
	/*	Procedure
			['0']				data[0]==1 - return items
			['1','offerNum']	data[0]==1 - add item 
			['2','offerNum']	data[0]==2 - remove
	*/
	class Basket
	{
		
		public $items;

		function __construct()
		{
			$data = json_decode(stripslashes($_POST['data']));
			switch ((int)$data[0]) {
				case 1:
					$this->add($data[1]);
					break;
				case 2:
					$this->remove($data[1]);
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

		public function show()
		{
			if (isset($_SESSION['basket']))
				xmlStatusSend($_SESSION['basket']);
			else
				xmlStatusSend(0);
		}		

	}

	$basket = new Basket();
?>