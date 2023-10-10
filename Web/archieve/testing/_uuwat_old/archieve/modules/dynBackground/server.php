<?php
	//If mysql cell "backgroundImage is NOT empty" do something (get current page and stuff like that)
	//Path, type {full,topLeft,half,etc or tiled:data(background-size, repeat x or y...)}

	/*
		Pass this string to a function so the variables can be simple and private.
		The function will return a string used to inject a div into the dom.
	*/
	//Perhaps later types will have an extra mysqlColumn (data) for extra styles
		//Tidy this up...
		//if the background image doesn't exist... log and then don't include files or execute

	class DynBackground
	{
		private $data, $hasBg;
		private $imgPath, $imgType, $imgWidth, $imgHeight;
		public function __construct() //checks existance of background table, if not makes one
		{
			if(!mysqli_query(dbConn(), "SELECT * FROM dynBg"))
			{
				$sql = 
				"CREATE TABLE dynBg
				(
					id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
					page VARCHAR(25) NULL,
					imgPath TEXT NULL,
					imgType VARCHAR(25) NULL
				)";
				mysqli_query(dbConn(), $sql);
			}

			//$page = $GLOBALS["activePage"]; For now, all pages have the same background
			$result = mysqli_query(dbConn(), "SELECT * FROM dynBg WHERE page='home'");
			if(mysqli_num_rows($result))
			{
				$this->data = mysqli_fetch_assoc($result);
				$this->hasBg = true;
			}
			else
				$this->hasBg = false;
		}

		private function processData()
		{
			$this->imgPath = $this->data["imgPath"];
			$this->imgType = $this->data["imgType"];

			$imgDims = getimagesize($this->imgPath);
			$this->imgWidth = $imgDims[0];
			$this->imgHeight = $imgDims[1];

		}

		public function setup()
		{
			if($this->hasBg)
			{
				$this->processData();
				setHeader("<link rel='stylesheet' type='text/css' href='plugins/dynBackground/styles.css'>");
				setHeader("<script type='text/javascript' src='plugins/dynBackground/client.js'></script>");
			}
		}

		public function getBg()
		{
			$output = "";
			$script = "";
			if($this->hasBg)
			{	
				switch($this->imgType)
				{
					case "imgFull":
						$output = '<div id="dynBg"><div class="'.$this->imgType.'" style="display:none;">'.$this->imgPath.','.$this->imgWidth.','.$this->imgHeight.'</div></div>';
						break;
					default:
						break;
				}

				$script = "<script type='text/javascript'>dynBgInit();</script>";
			}

			return $output.$script;
		}

	}
?>
