<?php
	class BuildPackageList extends BPLCore
	{
		public function __construct($searchLocations)
		{
			$this->packageArray = $this->getPackageArray($this->getPackageFiles($searchLocations));
		}

		private function getPackageFiles($searchLocations)
		{
			$packageFiles = array();
			foreach($searchLocations as $key1 => $value1)
			{
				$resultArray = $this->getFileArray($value1, $this->regexArgs);
				foreach ($resultArray as $key2 => $value2)
				{
					array_push($packageFiles, $value2);
				}
			}

			return $packageFiles;
		}

		//This creates packagenames from filepaths and stores them in an assoc array
		private function getPackageArray($packageFiles)
		{
			$packageArray = array();
			foreach($packageFiles as $value)
			{
				$packageName = str_replace("Package.php", "", basename($value));

				//Later make a new FileSearch to find all instances of the duplicated class file to dump into crash array.
				if(empty($packageArray[$packageName]))					
					$packageArray[$packageName] = $value;
				else
					throw new Exception("Duplicate package of \"".$packageName."\" detected.");
			}

			return $packageArray;
		}

		public function buildList($listLocation)
		{
			$fileOut = $this->getOutput($this->getParsedArray($this->packageArray));

			//this will create a new file each time it is run
			$this->writeListFile($fileOut, $listLocation."packageList.php");
		}
	}
?>
