<?php
	require $_SERVER["DOCUMENT_ROOT"]."/config.php";
	require Config::path("uuwat")."DatabaseManager/DataObjectClass.php";
	require Config::path("appPATH")."core/userDBconn.php";
	if(!empty($_GET["updatePara"]))
	{
		$updatePara = new DataObject("UPDATE paragraphs SET text=? WHERE id={$_GET["paraID"]};");
		$updatePara->runQuery(array($_GET["updatePara"]));
		
		$getPara = new DataObject("SELECT text FROM paragraphs WHERE id=?;");
		$getPara->runQuery(array($_GET["paraID"]));
		echo $getPara->fetchData()["text"];
	}

	//header("Location: /".$_GET["redirectPage"]);


	exit();
?>
