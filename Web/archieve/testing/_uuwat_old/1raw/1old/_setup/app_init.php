<?php
	//Use the default database connection first.
	require Config::$dbConn['user'];
	
	//This is where headers, title, meta data are set before loading the DOM
	Headers::$title = 'AppName';
	Headers::$author = 'Firstname Lastname';
	//Headers::newjs('path/to/javascript-file.js');
	//Headers::newcss('path/to/css-file.css');

	//This output buffer takes all html output and stores it in a variable without displaying it.
	ob_start();

	/* Put all your app code here */
	echo '<h1>Hello world!</h1>';

	//Gather all headers and output and inject into DOM.php
	$headersOutput = Headers::getHeaders();
	$output = ob_get_clean();
	
	require 'DOM.php';
?>