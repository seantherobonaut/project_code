<?php
	class TableManager extends FileSearch
	{
		/*
			for constructor, get filearray

			include each file(doesn't matter if there are duplicates)

			for each array item, include, and push the contents of $sql to array

			foreach of the sqlstrings, run them


			outside the class, implode the sql array and run it as one string in a dataObject
		*/
		private $tableFileArray = array();
		private $sqlArray = array();
		public function __construct($searchPath, $regexArgs)
		{
			$this->tableFileArray = $this->getFileArray($searchPath, $regexArgs);
			$this->prepSqlArray($this->tableFileArray);
		}

		private function prepSqlArray($sqlArray)
		{
			foreach ($sqlArray as $key => $value)
			{
				$sql = null;
				include $value;
				if(!empty($sql))
					array_push($this->sqlArray, $sql);
			}
		}

		public function getSqlArray()
		{
			return $this->sqlArray;
		}

		public function getSql($sqlArray)
		{
			return implode("",$sqlArray);
		}
	}
?>
