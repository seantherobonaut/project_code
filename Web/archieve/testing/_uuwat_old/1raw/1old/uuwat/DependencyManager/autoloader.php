<?php
/*
	Dependency class 
		__construct(listfile, array(search paths)) ...if no list call buildList()

	public buildList
		Rather than copying the FileSearch class, you will copy some code from it, very minimal

	public autoLoader($callName)


pass array to function, maybe with typehint of callable

call_user_func(array($this, 'bar'))


	spl_autoload_register('uuwat_autoloader') will be called outside this file in index.php or where ever, you can call static methods using that callback, check php.net
*/


	//This file must be required by a file in the root path
	if(!file_exists(Config::$path['app'].'includeList.php'))
	{
		require 'uuwat/FileSearchClass.php';
		require 'IncludeListBuilderClass.php';
		$listBuilder = new IncludeListBuilder;
		$listBuilder->setListLocation(Config::$path['app'].'includeList.php');
		$listBuilder->setPaths(Config::$searchPaths);
		$listBuilder->buildList();
		unset($listBuilder);
	}
	
	function uuwat_autoloader($callName)
	{
		require Config::$path['app'].'includeList.php';
		//if(!empty($globalIncludeList[$callName])) //improve performance by crashing here
			require $globalIncludeList[$callName];
	}
	spl_autoload_register('uuwat_autoloader');
?>