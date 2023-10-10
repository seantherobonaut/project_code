<?php
	//TODO write more comments and do not worry about replacing tons of things with commans or single quotes for now
	//TODO if properties are empty, do something else instead of crash
	class RequestProxyListBuilder
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
				$fSearchObj->searchFiles($value, '/^.+RequestProxy\.php$/');

			return $fSearchObj->getFileArray();
		}

		private function getRequestProxyArray($requestProxyFiles)
		{
			$requestProxyArray = array();
			foreach($requestProxyFiles as $value)
			{
				$requestProxyName = str_replace('RequestProxy.php', '', basename($value));

				//TODO funnel all instances of the duplicated class file into crash array.
				if(empty($requestProxyArray[$requestProxyName]))					
					$requestProxyArray[$requestProxyName] = $value;
				else
					trigger_error("Duplicate instance of \"$requestProxyName\" detected ($value).", E_USER_ERROR);
			}

			return $requestProxyArray;
		}

		//This prepares the inner string to match php syntax before being written to a file
		private function getParsedArray($requestProxyArray)
		{
			$requestProxyString = null;
			foreach($requestProxyArray as $key => $value)
				$requestProxyString = "$requestProxyString\t\t'$key' => '$value',\n";

			return $requestProxyString;		
		}

		//Final php syntax fixes before being written to a file
		private function getOutput($requestProxyString)
		{
			$fOutput = substr($requestProxyString, 0, -2); //erases the last newline and comma
			$fOutput = "<?php\n\t\$globalRequestProxyList = array\n\t(\n$fOutput\n\t);\n?>\n";
			return $fOutput;
		}

		private function writeListFile($fOutput, $targetFile)
		{
			$requestProxyList = fopen($targetFile, 'w');
			fwrite($requestProxyList, $fOutput);
			fclose($requestProxyList);
		}

		public function buildList()
		{
			$fileOut = $this->getOutput($this->getParsedArray($this->getRequestProxyArray($this->getFiles())));
			$this->writeListFile($fileOut, $this->listLocation);//this will create a new file each time it is run
		}
	}
?>
