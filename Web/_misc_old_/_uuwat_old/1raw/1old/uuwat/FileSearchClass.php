<?php
	//This class searches through provided filepaths to match files with regex strings
	//It seems like it only searches the ends of filenames
	class FileSearch
	{
		public $pathSlashMode = "forward";
		private $fileArray=array();

		private function formatPath($fileString)
		{
			if($this->pathSlashMode == "forward")
				$fileString = str_replace("\\", "/", $fileString);

			if($this->pathSlashMode == "backward")
				$fileString = str_replace("/", "\\", $fileString);

			return $fileString;
		}

		public function searchFiles($searchPath, $regexArgs)
		{
			if(file_exists($searchPath))
			{
				$results = array();
				$resultArray = new RegexIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($searchPath)), $regexArgs, RecursiveRegexIterator::GET_MATCH);
				foreach($resultArray as $row)
					array_push($results, $this->formatPath($row[0]));

				$this->fileArray = array_merge($this->fileArray, $results);
			}
		}

		public function reset()
		{
			$this->fileArray = array();
		}

		public function getFileArray()
		{
			return $this->fileArray;
		}
	}
?>
