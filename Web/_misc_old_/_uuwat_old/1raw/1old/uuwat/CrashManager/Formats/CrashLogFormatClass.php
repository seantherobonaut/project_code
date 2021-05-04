<?php
	//TODO try/catch everywhere isn't as efficient. Try making an array with null values instead
	class CrashLogFormat implements CrashFormatInterface
	{
		private $dataArray;
		public function setData($dataArray)
		{
			$this->dataArray = $dataArray;
		}

		public function getOutput()
		{
			$crashMessage = null;
			$crashMessageTitle = null;
			$crashMessageData = null;

			//prepare title of crash
			$crashMessageTitle = $this->dataArray["time"].": ".$this->dataArray["type"]."! ".$this->dataArray["file"]." - line:".$this->dataArray["line"];

			//prepare data of crash
			$crashMessageData = array("message" => $this->dataArray["message"]);
			if(!empty($this->dataArray["details"]))
				$crashMessageData["details"] = $this->dataArray["details"];
			$arrayString = new FormatArray;
			$arrayString->setArray($crashMessageData);
			$crashMessageData = $arrayString->getString();

			$crashMessage = $crashMessageTitle."\n".$crashMessageData;
			$crashMessage = str_replace("\n","\n\t",$crashMessage); //Indent all items over 1 tab

			return $crashMessage;
		}
	}
?>
