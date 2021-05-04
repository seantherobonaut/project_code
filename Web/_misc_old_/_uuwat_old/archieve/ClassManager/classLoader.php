<?php
	//This file requires the config.php file

	//If the classfile doesn't exist, create one
	if(!file_exists(appPATH."classList.php"))
	{
		require_once UUWAT."FileSearchClass.php";
		require_once UUWAT."ClassManager/BCLCoreClass.php";
		require_once UUWAT."ClassManager/BuildClassListClass.php";

		$bcl = new BuildClassList(array(UUWAT, appPATH, modsPATH));
		$bcl->buildList(appPATH);
		unset($bcl);
	}

	//Auto include classfiles by simply calling their names
	spl_autoload_register(function($className)
	{
		require_once appPATH."classList.php";
		if(!empty($globalClassList[$className]))
			include_once $globalClassList[$className];
	});
?>
