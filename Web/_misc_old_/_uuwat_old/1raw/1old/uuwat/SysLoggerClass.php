<?php
    class SysLogger
    {
        private $loggerObj;
        public function __construct()
        {
            $this->loggerObj = new Logger;
        }

        public function pushLog($data)
        {
            $this->loggerObj->pushLog(Config::$path['app'].'logs/system.log', $data);
        }

        public function log($data)
        {
            $this->loggerObj->log(Config::$path['app'].'logs/system.log', $data);
        }
    }
?>
