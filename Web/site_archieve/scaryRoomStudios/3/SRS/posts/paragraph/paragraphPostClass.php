<?php
	class paragraphPost implements BaseContentInterface
	{
		private $data_id;
		public function init($id)
		{
			$this->data_id = $id;
		}

		public function exec()
		{
			$getText = new DataObject("SELECT * FROM `paragraph` WHERE id=?;");
			$getText->runQuery(array($this->data_id));
			echo '<p>'.$getText->fetchData()['text'].'</p>';
		}
	}
?>
