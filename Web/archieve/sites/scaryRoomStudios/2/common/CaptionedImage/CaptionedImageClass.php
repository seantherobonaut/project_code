<?php
	class CaptionedImage extends CaptionedImageIO
	{
		public function __construct()
		{
			parent::__construct();
		}

		//TODO if empty, return nothing
		public function getContent($id)
		{
			return "
			<div>
				<img src=\"{$this->selectItem($id)['url']}\">
				<br>
				<p>{$this->selectItem($id)['desc']}</p>
			</div>";	
		}
	}
?>