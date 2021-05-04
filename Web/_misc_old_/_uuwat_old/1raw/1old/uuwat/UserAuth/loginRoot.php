<?php
	/*
		when project first starts, it will require to make a new uuwat user if none is detected
			so...if there isn't a login file here then throw error
	*/

	//TODO Make this more complex later with nested rootUsers sean{[id,user,pass,etc...]},bob{[id,user,pass,etc...]} (user_id's have 00, 01, etc...)
	
	/*
		When no root_login.php is detected, log that there isn't a file
		Check if setup is set (make a temp file that holds a value for setup)
			If setup is not valid, offer user the chance to create a new root user and password
			If setup is valid, make an error message that the file doesn't exist(admin can set one)
	*/

	//Keep in mind there might be a problem with conflicting userIDs vs rootIDs
	$rootFile =  Config::$path['app'].'config/root_login.php'; //user_id, username, password, rank, active
	if(file_exists($rootFile))
	{
		require $rootFile;
		if($userLoginInput['username'] == $rootLoginArray['username'])
			$loginData = $rootLoginArray;
		else
			$loginData = null;		
	}
	else
		$loginData = null;
?>
