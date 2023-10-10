<?php
	class UserLoginTemplate implements BaseContentInterface
	{
		public function init($id)
		{
			Headers::newcss(Config::$path['appLocal'].'templates/user-login/styles.css');
		}
		public function exec()
		{
			require 'html.php';
		}
	}
?>
