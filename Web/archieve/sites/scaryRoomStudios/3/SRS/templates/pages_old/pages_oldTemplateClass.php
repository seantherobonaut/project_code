<?php
	class pages_oldTemplate implements BaseContentInterface
	{	
		private $id;
		public function init($id)
		{
			$this->id = $id;
		}
		public function exec()
		{			
			if(!empty($_GET['page']))
			{
				$page = $_GET['page'];
				if($page!='home' && $page!='soundDesigns' && $page!='contact')
					echo htmlOut('Old template not found!');
				else
					require $page.'.php';
			}
			else
				echo htmlOut('Page is not set!');

			$templateID = $this->id;
			if(!empty($_SESSION['user_data']))						
				if($_SESSION['user_data']['rank']=='admin')				
					require Config::$path['app'].'Tools/buttons/deleteTemplate.php';				
		}
	}
?>
