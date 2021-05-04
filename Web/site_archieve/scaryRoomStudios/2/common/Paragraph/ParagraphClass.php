<?php
	class Paragraph extends ParagraphIO
	{
		private $permission;
		public function __construct()
		{
			parent::__construct();
			$this->permission = new Permission;

			$this->permission->setDataType("paragraph");
			if(!empty($_SESSION['user_data']))
				$this->permission->setUserData($_SESSION['user_data']);
			else
				$this->permission->setUserData(null);
		}

		//TODO if empty, return nothing
		public function getContent($id)
		{
			//in progress
			$button = "";
			if($this->permission->checkID($id))                                                       
				$button = "<button>Click me!</button>";

			return "
			<div id=\"para-{$this->selectItem($id)['id']}\" class=\"paragraph\">
				<p>id:{$this->selectItem($id)['id']} - 
					{$this->selectItem($id)['text']}
				</p>
				$button
			</div>
			";
		}
	}
?>
