<?php
	//replaec &lt; with < and &gt; as > also include ? and dashes
	class StringFinder
	{
		public function getMatchFiles($phrase, $fileSet)
		{
		    $matches = array();
			
		    foreach($fileSet as $fileName)
		    {
				$file = fopen($fileName, "r");
				
				$lineNumber = 1;
				while(($line = fgets($file, 4096)) !== FALSE)
				{
					$offset = 0;
				    while(($pos = strpos($line, $phrase, $offset)) !== FALSE)
				    {
				        $offset = $offset + $pos + strlen($phrase);
				        array_push($matches, array("file"=>$fileName,"line"=>$lineNumber,"pos"=>$pos));
				    }
					$lineNumber++;
				}

				fclose($file);	
		    }

		    return $matches;
		}
	}
?>
