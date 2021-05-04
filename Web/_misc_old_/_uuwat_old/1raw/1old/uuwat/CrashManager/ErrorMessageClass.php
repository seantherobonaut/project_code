<?php
	class ErrorMessage implements CrashDataInterface
	{
		private $dataArray;

		public function __construct($errorNo, $message, $file, $line, TimeStamp $TSobject) //SystemTimeStamp will extend abstract timestamp
		{
			$this->dataArray["errorNo"] = $errorNo;
			$this->dataArray["type"] = "Error";
			$this->dataArray["file"] = $file;
			$this->dataArray["line"] = $line;
			$this->dataArray["time"] = $TSobject->getStamp();
			$this->dataArray["message"] = $message;
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
