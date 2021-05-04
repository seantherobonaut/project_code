<?php
	require 'uuwat/ConfigClass.php';
	require 'uuwat/uuwat_config.php';
	Config::$path['app'] = Config::$path['root'].'SRS/';

	require Config::$path['app'].'core/app_config.php';
?>
