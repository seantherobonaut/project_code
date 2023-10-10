<?php
	//TODO write more comments and do not worry about replacing tons of things with commans or single quotes for now
	//TODO if properties are empty, do something else instead of crash
	class IncludeListBuilder
	{
		private $listLocation = null;
		private $searchPaths = null;

		public function setListLocation($location) 
		{
			$this->listLocation = $location;
		}

		public function setPaths($pathArray)
		{
			$this->searchPaths = $pathArray;
		}

		private function getFiles()
		{
			$fSearchObj = new FileSearch;
			$fileArray = array();
			foreach($this->searchPaths as $value)
			{
				$fSearchObj->searchFiles($value, '/^.+Interface\.php$/');
				$fSearchObj->searchFiles($value, '/^.+Abstract\.php$/');
				$fSearchObj->searchFiles($value, '/^.+Class\.php$/');
			}
			return $fSearchObj->getFileArray();
		}

		private function getIncludeArray($includeFiles)
		{
			$includeArray = array();
			foreach($includeFiles as $value)
			{
				//Make it so you can instantiate a class without the suffix 'SomethingClass'
				$includeName = str_replace('Class.php', '', basename($value));
				$includeName = str_replace('.php', '', basename($includeName));

				//TODO funnel all instances of the duplicated class file into crash array.
				if(empty($includeArray[$includeName]))					
					$includeArray[$includeName] = $value;
				else
					trigger_error("Duplicate instance of \"$includeName\" detected ($value).", E_USER_ERROR);
			}

			return $includeArray;
		}

		//This prepares the inner string to match php syntax before being written to a file
		private function getParsedArray($includeArray)
		{
			$includeString = null;
			foreach($includeArray as $key => $value)
				$includeString = "$includeString\t\t'$key' => '$value',\n";

			return $includeString;		
		}

		//Final php syntax fixes before being written to a file
		private function getOutput($includeString)
		{
			$fOutput = substr($includeString, 0, -2); //erases the last newline and comma
			$fOutput = "<?php\n\t\$globalIncludeList = array\n\t(\n$fOutput\n\t);\n?>\n";
			return $fOutput;
		}

		private function writeListFile($fOutput, $targetFile)
		{
			$includeList = fopen($targetFile, 'w');
			fwrite($includeList, $fOutput);
			fclose($includeList);
		}

		public function buildList()
		{
			$fileOut = $this->getOutput($this->getParsedArray($this->getIncludeArray($this->getFiles())));
			$this->writeListFile($fileOut, $this->listLocation);//this will create a new file each time it is run
		}
	}
?>
