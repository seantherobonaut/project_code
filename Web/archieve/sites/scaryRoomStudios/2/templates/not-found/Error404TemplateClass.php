<?php
	class Error404Template implements TemplateInterface
	{
		public function init()
		{
			echo htmlOut("404 - Page not found!");
		}
	}
?>
