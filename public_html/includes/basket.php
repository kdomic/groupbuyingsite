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
			if ($_SESSION['basket'])
				$_SESSION['basket'] .= $value.';';
			else
				$_SESSION['basket'] = $value.';';
		}		

		public function remove($value='')
		{
			# code...
		}

		public function show()
		{
			if ($_SESSION['basket'])
				xmlStatusSend($_SESSION['basket']);
			else
				xmlStatusSend(0);
		}		

	}

	$basket = new Basket();
?>