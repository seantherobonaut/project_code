<?php
	//This class contains methods used by the child class to write a properly formatted classList file.
	class BCLCore extends FileSearch 
	{
		protected $classArray = null; //array
		protected $regexArgs = "/^.+Class\.php$/i";

		//This prepares the inner string to match php syntax before being written to a file
		protected function getParsedArray($classArray)
		{
			$classString = null;
			foreach($classArray as $key => $value)
				$classString .= "\t\t\"".$key."\" => \"".$value."\",\n";

			return $classString;		
		}

		//Final php syntax fixes before being written to a file
		protected function getOutput($classString)
		{
			$fOutput = substr($classString, 0, -2); //erases the last newline and comma
			$fOutput = "<?php\n\t\$globalClassList = array\n\t(\n".$fOutput."\n\t);\n?>\n";
			return $fOutput;
		}

		protected function writeListFile($fOutput, $targetFile)
		{
			$classList = fopen($targetFile, "w");
			fwrite($classList, $fOutput);
			fclose($classList);
		}
	}
?>
