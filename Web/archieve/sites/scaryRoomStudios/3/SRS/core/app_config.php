<?php
	Config::$path['appLocal'] = str_replace(Config::$path['root'], '', Config::$path['app']);
	Config::$path['templates'] = Config::$path['app'].'templates/';
	Config::$searchPaths['webapp'] = Config::$path['app'];

	Config::$dbConn['sys'] = Config::$path['app'].'core/sysDBconn.php';
	Config::$dbConn['user'] = Config::$path['app'].'core/userDBconn.php';
?>
