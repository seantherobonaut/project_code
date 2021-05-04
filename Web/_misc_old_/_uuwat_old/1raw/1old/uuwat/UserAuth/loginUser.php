<?php
	require Config::$dbConn['sys'];

	$loginDB = new DataObject("SELECT * FROM users where username=?;");
	$loginDB->runQuery(array($userLoginInput["username"]));
	if($loginDB->rowCount())
		$loginData = $loginDB->fetchData();
	else
		$loginData = null;
?>
