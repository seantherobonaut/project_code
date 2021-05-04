<?php
	class UserLoginTemplate implements TemplateInterface
	{
		public function __construct()
		{
			Headers::newcss(Config::$path['appLocal'].'templates/user-login/styles.css');			
		}
		public function init()
		{
			require 'html.php';
		}
	}
?>
