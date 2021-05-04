<?php
	class BPLCore extends FileSearch 
	{
		protected $packageArray = null; //array
		protected $regexArgs = "/^.+PackageRegister\.php$/i";

		//This prepares the inner string to match php syntax before being written to a file
		protected function getParsedArray($packageArray)
		{
			$packageString = null;
			foreach($packageArray as $key => $value)
				$packageString .= "\t\t\"".$key."\" => \"".$value."\",\n";

			return $packageString;		
		}

		//Final php syntax fixes before being written to a file
		protected function getOutput($packageString)
		{
			$fOutput = substr($packageString, 0, -2); //erases the last newline and comma
			$fOutput = "<?php\n\t\$globalPackageList = array\n\t(\n".$fOutput."\n\t);\n?>\n";
			return $fOutput;
		}

		protected function writeListFile($fOutput, $targetFile)
		{
			$packageList = fopen($targetFile, "w");
			fwrite($packageList, $fOutput);
			fclose($packageList);
		}
	}
?>
