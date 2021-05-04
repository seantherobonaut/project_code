<?php
	interface CrashDataInterface
	{
		public function getData(CrashFormatInterface $formatObj);
		public function getAllData();
	}
?>
