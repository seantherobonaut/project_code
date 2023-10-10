<?php
	function error_handler($errorNo, $message, $file, $line)
	{
		$crashMessage = new ErrorMessage($errorNo, $message, $file, $line, new TimeStamp); //same below this line

		$logger = new SysLogger;
		$logger->pushLog($crashMessage->getData(new CrashLogFormat));

		$outputData = $crashMessage->getAllData();
		require 'displayCrash.php';
		exit();
	}
	set_error_handler('error_handler', E_ALL);

	function exception_handler($exception)
	{
		$crashMessage = new ExceptionMessage($exception, new TimeStamp); //same below this line

		$logger = new SysLogger;
		$logger->pushLog($crashMessage->getData(new CrashLogFormat));

		$outputData = $crashMessage->getAllData();
		require 'displayCrash.php';
		exit();
	}
	set_exception_handler('exception_handler'); //This can catch parse errors!...or at least it used to...maybe only under certain conditions?

?>
