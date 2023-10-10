<?php
    class TableRegisterSearch
    {
        private $registers;
        public function __construct()
        {
            $fSearch = new SysFileSearch;
            $this->registers = $fSearch->getFiles('TableRegister.php');
        }

        private function getSqlArray()
		{
            $sqlArray = array();

			foreach($this->registers as $key => $value)
			{
				$sql = null;
				include $value;
				if(!empty($sql))
					array_push($sqlArray, $sql);
			}

            return $sqlArray;
		}

		public function getSQL()
		{
			return implode('', $this->getSqlArray());
		}
    }
?>
