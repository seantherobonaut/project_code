<?php
	require 'uuwat/Base/htmlPrinter.php';
	require 'core/userDBconn.php';
	
	Headers::$title = 'UUWAT';
	Headers::$author = 'Sean Leapley';
	Headers::newjs('uuwat/Base/jquery3.2.1.min.js');
	Headers::newcss('uuwat/Base/core.css');
	Headers::newjs('uuwat/Base/core.js');

	/* BUG!
		ajax proxies must not have errors because they don't redirect to the 
		error page properly. Maybe "Something went wrong"
		or return a meta tag that redirects to an error page
	*/

	ob_start(); 
			
		//look over this for later...ignore for now
		/*
			Use the get request to first get a root template (make a seperate folder for root templates then child templates)
			Load in the root templates with identical names so they can be passed to each other(polymorphic rather than creating 
			instances of the class in the class file). Then have the child templates act the same way. Common interface and use the name
			to pass them to the parent template object. 

			Recap:
			Get requeset gets parent template
				then gets child template
					then loads data stream
		*/

		//TODO create the root template selector here eventually
		//TODO put all templates in the same folder so they can load each other
		/*
			seach for a template with no parent...that is the root node(template) add a "parent" field to table

			there will be many templates of the same type with the same parent...but each template will use get requests to fetch different content

			template:mainTemplate parent:none name:start
			template:contentPage parent:mainTemplate name:home
			template:contentPage parent:mainTemplate name:aboutMe
			template:contentPage parent:mainTemplate name:contact


			WE can have nested templates! When the template calls all content types with page="home"
			entries of paragraphs and captioned images appear...but also we could have an entry in there that is a template
			if they all have the funciton init() or execute() they can take care of all that stuff themselves!
		*/
		//get titles

		//This function loads scripts (css/js) from a database table depending on what the get request value of "page" is
		function gatherHeaders($condition)
		{
			//The logic is encapsulated inside a function to reduce ambiguity 
			$scriptSearch = new DataObject('SELECT * FROM `scripts` WHERE `condition`=?;');
			$scriptSearch->runQuery(array('page:'.$condition));
			$results = $scriptSearch->fetchAllData();
			foreach ($results as $key) 
			{
				if($key['type'] == 'css')
					Headers::newcss($key['path']);
				if($key['type'] == 'js')
					Headers::newjs($key['path']);
			}
		}
		gatherHeaders($_GET['page']);


		$rootTemplate = new mainTemplate;
		$rootTemplate->init();

	$pageOutput = ob_get_clean();
	$headersOutput = Headers::getHeaders();
	require 'core/DOM.php';
?>
