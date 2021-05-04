<?php
	//This way, you can still do Error->getData(new Formatter)
	//Inside the get data it runs the Formatter->setdata and then Formatter->getOutput
	interface CrashFormatInterface
	{
		public function setData($dataArray);
		public function getOutput();
	}
?>
