<?php
	class ExceptionMessage implements CrashDataInterface
	{
		private $dataArray;

		public function __construct($exceptionObj, TimeStamp $TSobject) //without the Exception type, it can catch parse errors! woot!
		{
			$this->dataArray["type"] = "Exception";
			$this->dataArray["file"] = $exceptionObj->getFile();
			$this->dataArray["line"] = $exceptionObj->getLine();
			$this->dataArray["time"] = $TSobject->getStamp();

			$exceptionMessage = json_decode($exceptionObj->getMessage(),true);

			//If exception isn't json format, just put contents in message
			if(json_last_error() === JSON_ERROR_NONE)
			{
				//push all values to array, including overwriting them
   				foreach($exceptionMessage as $key => $value)
   					$this->dataArray[$key] = $value;

   				//ensure that details is always an array
   				if(!is_array($this->dataArray["details"]))
   					$this->dataArray["details"] = array($this->dataArray["details"]);
			}
   			else
   				$this->dataArray["message"] = $exceptionObj->getMessage();

   			//If for some reason the exception is missing "message", complain about it
   			if(empty($this->dataArray["message"]))
   			{
   				$this->dataArray["message"] = "Incorrect exception format!";
   				$this->dataArray["details"] = array("Missing \"message\" cell."); 
   			}
		}

		public function getData(CrashFormatInterface $formatObj)
		{
			$formatObj->setData($this->dataArray);
			return $formatObj->getOutput();
		}

		public function getAllData()
		{
			return $this->dataArray;
		}
	}
?>
