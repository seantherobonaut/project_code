<?php
    class SysFileSearch
    {
        private $FileSearchObj;

        public function __construct()
        {
            $this->FileSearchObj = new FileSearch;
        }

        public function getFiles($search)
        {
            $this->FileSearchObj->reset();

            $search = str_replace(".", "\.", $search); //this might not be needed
            foreach(Config::$searchPaths as $key => $value) 
                $this->FileSearchObj->searchFiles($value, "/^.+".$search."$/");
                
            return $this->FileSearchObj->getFileArray();
        }
    }
?>
