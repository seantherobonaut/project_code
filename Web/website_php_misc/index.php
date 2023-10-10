<?php	
	//TODO create UUWAT login ajax	
	//TODO organize filesystem ex: core(frontEndCompat, core.css, core.js)
	//TODO see if IE still has a problem with formmatting on submit button with strict CSS from core
	
	//LEARN php headers header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404)
	//LEARN http responses http_response_code(404)

	//TODO prevent any output with the output buffer... actualy does output buffer flush if there's an error anyway?

	//NOTE outputting php plain text before the header (doctype and document stuff) creates a lag. Don't output unless inside html. 
	
	/* PLAN
		Get basic routing working (make it more complex as time goes on, keep design modular)
		Get basic layout working
			Page given from request
				Page goes back to server for data like links and content		
			
		Include UUWAT components (.htaccess,config, debugger, dependency, database connection(make tables...(what happens if no table registers?)))		
	*/

	//Do not differentiate requests vs pages, that is the programmers job to get right internally

	switch($_SERVER['REQUEST_METHOD'])
	{
		case 'GET':
			//Take the query_string and convert it into an array even if empty
			parse_str($_SERVER['QUERY_STRING'],$query_data);
			//TODO rather than using the query_string, maybe use the $_GET parameters to make this design consistent with handling POST which doesn't have query_string

			//Erase query_string from request_uri if it exists
			$path_data = str_replace('?'.$_SERVER['QUERY_STRING'],'',$_SERVER['REQUEST_URI']);

			//Erase first forward slash if path_data string length is greater than 1
			if(strlen($path_data)>1)		
				$path_data = substr($path_data,1,strlen($path_data)-1);
			else
				$path_data = '';

			//Convert path_data into array even if empty
			if(!empty($path_data))
				$path_data = explode("/",$path_data);
			else
				$path_data = array('home');

			//Take case-sensitive action based on root request (maybe have a counter as you pass along page_data[i]?)
			switch($path_data[0])
			{
				case 'home':
					require 'DOM.php';
					break;
				case 'comments':
					require 'comments.php';
					break;
				default:
					echo '404 - Page not found.'; //Eventually make this its own page. 
					break;
			}
			break;

		case 'POST':
			echo '<pre>';
			print_r($_SERVER['REQUEST_URI']);
			echo '<br>';
			print_r($_POST);
			echo '</pre>';
			break;

		default:
			echo 0;
			break;
	}
?>
