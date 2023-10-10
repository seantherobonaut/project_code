<?php
	//Use the default database connection first.
	require Config::$dbConn['user'];
	require 'uuwat/Base/htmlPrinter.php';
	
	//This is where headers, title, meta data are set before loading the DOM
	Headers::$title = 'AppName';
	Headers::$author = 'Firstname Lastname';
	//Headers::newjs('path/to/javascript-file.js');
	//Headers::newcss('path/to/css-file.css');

	//This output buffer takes all html output and stores it in a variable without displaying it.
	ob_start();

	/* Put all your app code here */
	echo preFormat('Hello world! This is a test app page!');

	//Gather all headers and output and inject into DOM.php
	$headersOutput = Headers::getHeaders();
	$output = ob_get_clean();
	
	require 'DOM.php';
?>