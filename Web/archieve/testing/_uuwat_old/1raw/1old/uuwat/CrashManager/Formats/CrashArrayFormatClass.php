<?php
	class CrashArrayFormat implements CrashFormatInterface
	{
		private $dataArray;
		public function setData($dataArray)
		{
			$this->dataArray = $dataArray;
		}

		public function getOutput()
		{
			$crashArray = null;
			$crashArray["title"] = $this->dataArray["type"]."! ".$this->dataArray["file"]." - line:".$this->dataArray["line"];
			$crashArray["data"] = array
			(
				"message" => $this->dataArray["message"]
			);
			if(!empty($this->dataArray["details"]))
				$crashArray["data"]["details"] = $this->dataArray["details"];

			return $crashArray;
		}
	}
?>
