<?php
	/*
		This is designed to search through a list of directories for all filenames containing the string
		"Class.php" and push them to an associative array containing the classname and source file.

		By calling the method buildList($listLocation), the stored class array is written to a file in
		the provided $listLocation directory.

		When php first runs, it includes a php file that contains an associative array which holds
		all classnames and their associated filepaths respectively with NO duplicates.

		When a class is being instantiated, spl_autoload_register() checks to see if the classname
		exists in the classList array. If the class exists, the associated filepath is included. If
		not, there are no exceptions thrown and the classfile must be included manually. classfile.
	*/
	class BuildClassList extends BCLCore
	{
		public function __construct($searchLocations)
		{
			$this->classArray = $this->getClassArray($this->getClassFiles($searchLocations));
		}

		private function getClassFiles($searchLocations)
		{
			$classFiles = array();
			foreach($searchLocations as $key1 => $value1)
			{
				$resultArray = $this->getFileArray($value1, $this->regexArgs);
				foreach ($resultArray as $key2 => $value2)
				{
					array_push($classFiles, $value2);
				}
			}

			return $classFiles;
		}

		//This creates classnames from filepaths and stores them in an assoc array
		private function getClassArray($classFiles)
		{
			$classArray = array();
			foreach($classFiles as $value)
			{
				$className = str_replace("Class.php", "", basename($value));

				//Later make a new FileSearch to find all instances of the duplicated class file to dump into crash array.
				if(empty($classArray[$className]))					
					$classArray[$className] = $value;
				else
					throw new Exception("Duplicate class of \"".$className."\" detected.");
			}

			return $classArray;
		}

		public function buildList($listLocation)
		{
			$fileOut = $this->getOutput($this->getParsedArray($this->classArray));

			//this will create a new file each time it is run
			$this->writeListFile($fileOut, $listLocation."classList.php");
		}
	}
?>
