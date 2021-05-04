<?php
	Config::$path['appLocal'] = str_replace(Config::$path['root'], '', Config::$path['app']); //make a local path by removing the absolute path
	Config::$path['templates'] = Config::$path['app'].'templates/';
	Config::$searchPaths['webapp'] = Config::$path['app']; //set a searchPath so the system file search will look through your files

	Config::$dbConn['sys'] = Config::$path['app'].'config/sysDBconn.php'; //holds a static method call for root level database access
	Config::$dbConn['user'] = Config::$path['app'].'config/userDBconn.php'; //holds a static method call for basic level database access
?>
