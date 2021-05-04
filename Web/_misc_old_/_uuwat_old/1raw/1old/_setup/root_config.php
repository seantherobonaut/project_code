<?php
	/*
		This file must always be located in your website's root path.
		Most of the time, you only need to set your webapp's path in this file.

		It would be a good idea to set Config::$searchPaths["modules"] for downloaded addon modules.
		For future reference, you can set configs using session variables to load other web apps with minimal file alterations.
	*/

	require 'uuwat/ConfigClass.php';
	Config::$path['root'] = __DIR__.'/'; //considered bad practice to use $_SERVER['DOCUMENT_ROOT']

	//TODO if 'app' is not set, redirect to a prompt to write a new line to this file "Config::$path['app'] = something"
	Config::$path['app'] = Config::$path['root'].'...PATH TO APP.../'; //Point to your webapp that ends with 

	require Config::$path['app'].'config/uuwat_config.php'; //Point to your uuwat config
	require Config::$path['app'].'config/app_config.php'; //Point to your webapp's config
	
	//TODO at END of root_config...if root_login does not exist in app/ then redirect to make one
?>
