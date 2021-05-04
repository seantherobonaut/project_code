<?php
	class Headers
	{
		public static $author = null;
		public static $title = null;
		public static $icon = null;

		private static $headers = array();

		public static function newcss($fString)
		{
			array_push(self::$headers, "<link rel=\"stylesheet\" type=\"text/css\" href=\"$fString\">");
		}

		public static function newjs($fString)
		{
			array_push(self::$headers, "<script type=\"text/javascript\" src=\"$fString\"></script>");
		}

		//public function keywords(){}
		//public function newfile($fString){}

		public static function getHeaders()
		{
			//to have these items on top, make a new array and merge the headers array with this one and return
			if(!empty(self::$author))
				array_push(self::$headers, '<meta name="author" content="'.self::$author.'">');

			if(!empty(self::$title))
				array_push(self::$headers, '<title>'.self::$title.'</title>');

			if(!empty(self::$icon))
				array_push(self::$headers, '<link rel="icon" type="image/png" href="'.self::$icon.'" />');

			$output = null;
			foreach(self::$headers as $item)
				$output .= $item;

			return $output;
		}
	}
?>
