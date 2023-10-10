<?php
	class Logger
	{
		//ensures the path to the logfile exists
		private function checkPath($file)
		{
			$path = str_replace(basename($file), '', $file);
			if(!file_exists($path))
				mkdir($path);
		}

		public function pushLog($file, $data)
		{
			$this->checkPath($file);

			$logFile = fopen($file, 'a');
			fwrite($logFile, $data."\n");
			fclose($logFile);
		}

		public function log($file, $data)
		{
			$this->checkPath($file);
			$tsObj = new TimeStamp;

			$logFile = fopen($file, 'a');
			fwrite($logFile, $tsObj->getStamp().": ".$data."\n");
			fclose($logFile);
		}
	}
?>
