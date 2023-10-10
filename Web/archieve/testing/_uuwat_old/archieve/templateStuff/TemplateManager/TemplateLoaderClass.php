<?php
	class TemplateLoader
	{
		private $notFound = null;
		private $ParentTemplateName = null;

		public function __construct($ParentTemplateName) //name of the template this line resides in
		{
			$this->ParentTemplateName = $ParentTemplateName;
		}

		public function set404($file)
		{
			$this->notFound = $file;
		}

		public function loadPointer($pointerNum)	//$variableArray = null
		{
			$TableName = "template".$this->ParentTemplateName."_pointer".$pointerNum;
			$sql = "SELECT templateNameID FROM ".$TableName.";";
			
			//this returns a templateNameID that will then be used to get the filepath and extra data for that template...try catch
			/*
				once filepath has been returned and json data array decoded, pass a (new object) that respects an interface to a method that
				returns the object. Use a try/catch and return null if interface is not respected and log it! Test all this...
				Then call the method inside here $object->getOutput();
			*/


			$this->notFound = null; //unset 404

			return $sql;
		}
	}	















//when passing a new template object to the loadPointer make sure it has an interface!!!


//$template = new TemplateLoader("Root"); 
	//!!!!!!!!!This still can work. 

	//write the reqirements for this file later dbobj, dbconn, dbinfo, base/checkString.php

	//the tablenames for each pointer will as follows:  templateName_loaderNumber
	/*
		Templates must be named with folder (name = tempalteName)   Name\nameTempClass.php
		Lots of try/catch blocks with a logger in the TemplateLoader class. Return null or 404 not crash.
		You can select wether or not you want to return null or just 404 by testing if result is null;

		TemplateLoader errors:
			Template file not found
			Template does not use interface (pass object to method...the returned new TemplateName)
			Template name cannot be instantiated

		maybe have a toggle on or off 404 message that is used once and reset upon next use

	*/

	//load the first template in the constructor?




		//optional parameter of assoc array with extra values...this will require "templates/_ROOT/RootClass.php";	
		//It will try to do private->NewTemplateObject->getHTML and if that is null, it will return either the 404.php or just null;

		//str_replace("world","Peter","Hello world!")
		/*
			Check data outside the loadPointer! send get/session/variable data as assoitive array values
			and then the load pointer just constructs the sql string and fills in the values given by other methods.
			Once loadPointer is run, it sets the object property $values = null again. 

			$object->setData("rank", $_SESSION[user_data][rank]); //this fills an assoc values array inside the object
				//this array will be used to fill an array inside loadPointer to have correct array fields set to null
				instead of nonexistant...or we could just output "if exist..." maybe not since I will be doing the query like
				:value instad of just ? marks so they don't need to be in order.
			loadPointer(3); //resets the values array to null
		*/






/*		public function load($tableName, $inputArray)
		{	
			$template = $this->notFound; //set default return

			//check if table exists, if true, compress array to match sql syntax
			//then, run sql and get the path of the tempalte
			$checkTemplate = new DBinfo;
			if($checkTemplate->table_exists($tableName))
			{
				$sql = null;
				foreach ($inputArray as $key => $value)
					$sql .= $key."="."\"".$value."\" AND ";

				$sql = substr($sql, 0, -5);
				
				$searchTemplate = new DataObject("SELECT path FROM ".$tableName." WHERE ".$sql.";");
				$searchTemplate->runQuery();
				$result = $searchTemplate->fetchData()["path"];                                       
				if(!empty($result))
					$template = $result;
			}

			return $template;
		}*/
?>
