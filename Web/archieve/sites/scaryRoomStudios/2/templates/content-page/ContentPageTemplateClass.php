<?php
	//TODO get title from database
	class ContentPageTemplate implements TemplateInterface
	{
		public function init()
		{
			$dataObjects = array
			(
				'paragraph' => new Paragraph,
				'captionedimage' => new CaptionedImage
			);
			
			$content = new ContentIO;
			$content->setContentTypes($dataObjects);
			$content->setContent('testhome');			
			require 'html.php';
		}
	}
?>
