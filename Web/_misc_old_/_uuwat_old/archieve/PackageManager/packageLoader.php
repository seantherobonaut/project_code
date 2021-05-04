<?php
	if(!file_exists(appPATH."packageList.php"))
	{
		$bpl = new BuildPackageList(array(UUWAT, appPATH, modsPATH));
		$bpl->buildList(appPATH);
		unset($bpl);		
	}
	function getPackage($packageName)
	{
		require_once appPATH."packageList.php";
		if(!empty($globalPackageList[$packageName]))
			return $globalPackageList[$packageName];
		else
			return null;
	}
?>
