<?php
	//This file must be required by a file from the root path AND $_GET["requestProxy"] is set
	if(!file_exists(Config::$path['app'].'requestProxyList.php'))
	{
		$listBuilder = new RequestProxyListBuilder;
		$listBuilder->setListLocation(Config::$path['app'].'requestProxyList.php');
		$listBuilder->setPaths(Config::$searchPaths);
		$listBuilder->buildList();
		unset($listBuilder);
	}
	
	require Config::$path['app'].'requestProxyList.php';
	require $globalRequestProxyList[$_GET['requestproxy']]; //TODO make better error output?
	exit();	//should there be an exit here?...not all proxies redirect (ajax ones don't)
?>