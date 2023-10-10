<?php
	class Config
	{
		public static $path = array();
		public static $module = array();
		public static $searchPaths = array();
		public static $dbConn = array();

		//TODO Make this function check all path arrays for incorrect path formats
		/*public static function checkPaths()
		{
			$lastChar = substr($path, -1);
			if($lastChar != '/' && $lastChar != '\\')
				$path .= "/";
		}*/
	}
?>
