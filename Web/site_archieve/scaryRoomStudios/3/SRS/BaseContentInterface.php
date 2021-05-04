<?php
	//Start using "final" to prevent people from overloading your methods and properties

	//This interface will be used by posts and templates to make nested templates/posts possible
	interface BaseContentInterface
	{
		public function init($id);
		public function exec();
	}
?>
