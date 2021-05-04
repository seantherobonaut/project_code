<?php
	class Error404Template implements BaseContentInterface
	{
		//init not used
		public function init($id){}
		public function exec()
		{
			require 'uuwat/Base/404/404html.php';
		}
	}
?>
