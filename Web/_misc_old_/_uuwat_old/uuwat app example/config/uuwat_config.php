<?php
	//This may only be included by root_config!
	Config::$path['uuwat'] = Config::$path['root'].'uuwat/';
	
	Config::$searchPaths['uuwat'] = Config::$path['uuwat'];

	Config::$module['crashHandler'] = Config::$path['uuwat'].'CrashManager/crashHandler.php';
	Config::$module['autoloader'] = Config::$path['uuwat'].'DependencyManager/autoloader.php';
?>
