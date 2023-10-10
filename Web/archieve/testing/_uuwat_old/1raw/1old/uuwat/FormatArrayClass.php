<?php
	//This class takes in an array and returns a formatted string that represets an array without syntax
	class FormatArray
	{
		private $array = null; 
		private $output = null;
		private $tab = null;
		private $newline = null;
		private $numTabs = 0;

		public function setArray($inputArray)
		{
			$this->array = $inputArray;
		}

		//recursively calls itself to go through an array and output all nested cells
		private function array_recursion($inputArray)
		{
		    foreach($inputArray as $key => $value)
		    {
		        if(is_array($value))
		        {
		        	$this->numTabs++;
		        	$this->array_recursion($value);
		        }
		        else
		        {
		        	for($i=0; $i < $this->numTabs; $i++)
		        		$this->output .= $this->tab;

		        	$this->output .= $value.$this->newline;
		        }
		    }
		    $this->numTabs--;   
		}

		//This is used by formats getString() and getHTML() below
		private function getArray($input)
		{
			$this->output = null;
			$this->numTabs = 0;
			$this->array_recursion($input);

			return $this->output;
		}

		public function getHTML()
		{
			if(!empty($this->array))
			{
				$this->tab = "&nbsp;&nbsp;&nbsp;&nbsp;";
				$this->newline = "<br>";
				
				//this gets rid of the last breakline
	 			$result = substr($this->getArray($this->array), 0, -4);
	 			return $result;
			}
			else
				return null;
		}

		public function getString()
		{
			if(!empty($this->array))
			{
				$this->tab = "\t";
				$this->newline = "\n";
				
				//this gets rid of the last newline
	 			$result = substr($this->getArray($this->array), 0, -1);
	 			return $result;
			}
			else
				return null;
		}
	}
?>
