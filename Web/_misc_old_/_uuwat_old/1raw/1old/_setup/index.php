<?php
	//You should almost never change this file.
	
	//basic includes and session utilities
	error_reporting(0);
	session_start();
	require 'root_config.php';
	require Config::$module['autoloader'];
	require Config::$module['crashHandler'];
	require 'uuwat/Base/lastLocation.php';

	//if there is no request proxy, or /admin then load project from the config path
	//TODO change this to a switch statement where the default is app_init
	if(empty($_GET['requestproxy']))
	{
		require 'uuwat/Base/homeRedirect.php';

		switch($_GET['page'])
		{
			case 'admin':
				require 'uuwat/Admin/admin.php';
				break;			
			case 'forgotPassword':
				require 'uuwat/UserAuth/forgotPassword/forgotPassword.php';
				break;
			case 'registerUser':
				require 'uuwat/UserAuth/registerUser/registerUser.php';
				break;
			default:
				require Config::$path['app'].'app_init.php'; //Main project starts here if other fields are empty
				break;
		}
	}
	else
		require 'uuwat/RequestProxyManager/requestProxyLoader.php';
?>
