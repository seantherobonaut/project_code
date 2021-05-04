<?php
	//This class searches through provided filepaths to match files with regex strings
	//It seems like it only searches the ends of filenames
	class FileSearch
	{
		private static function fixPath($fileString, $mode)
		{
			if($mode == "forward")
				$fileString = str_replace("\\", "/", $fileString);

			if($mode == "backward")
				$fileString = str_replace("/", "\\", $fileString);

			return $fileString;
		}

		public static function findRegex($regex, $searchPath, $pathMode = 'forward')
		{
			$results = array();

			if(file_exists($searchPath))
			{
				$resultArray = new RegexIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($searchPath)), $regex, RecursiveRegexIterator::GET_MATCH);
				foreach($resultArray as $row)
					array_push($results, $row[0]);															

				foreach($results as $key => $value) 
					$results[$key] = self::fixPath($value, $pathMode);
			}	

			return $results;
		}

		public static function find($filename, $searchPath, $pathMode = "/")
		{
            $filename = str_replace(".", "\.", $filename); //this might not be needed

			return self::findRegex("/^.+".$filename."$/", $searchPath, $pathMode);                          			
		}

		public static function findInFoldersRegex($regex, Array $folders, $pathMode = "/")
		{
			$results = array();

			foreach($folders as $value) 			
				$results = array_merge($results, self::findRegex($regex, $value, $pathMode));			

			return $results;
		}

		public static function findInFolders($filename, Array $folders, $pathMode = "/")		
		{
            $filename = str_replace(".", "\.", $filename); //this might not be needed

			return self::findInFoldersRegex("/^.+".$filename."$/", $folders, $pathMode);  
		}
	}
?>
