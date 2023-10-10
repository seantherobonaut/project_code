<?php
    class DataObject
    {
        private static $dbInstance=null;
        private $queryObject;
        private $numRows=0;

        public static function connect($host, $user, $pass, $dbname)
		{
			try
			{
				self::$dbInstance = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
			    self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e)
		    {
		    	trigger_error($e->getMessage(), E_USER_ERROR);
		    }
		}

        public function __construct($sql)
        {
            if(!empty(self::$dbInstance)) 
                $this->queryObject = self::$dbInstance->prepare($sql);
            else
                trigger_error('No database connection detected.', E_USER_ERROR);
        }

		public function runQuery($valuesArray = false)//have optional parameters now!
		{
            //TODO is there a way to detect failed updates or inserts? ex: update id that doesn't exist isn't throwing error...
            try
            {
                $this->queryObject->closeCursor();

                if(!$valuesArray)
                    $this->queryObject->execute();
                else
                    $this->queryObject->execute($valuesArray); //check if is_array...or test without exception?

                $this->numRows = $this->queryObject->rowCount();
                return true;
            }
            catch(Exception $e)
            {
                $timeStamp = new TimeStamp;
                $fileData = debug_backtrace();
                $dataArray = array();

                $dataArray['type'] = 'Exception';
                $dataArray['file'] = $fileData[0]['file'];
                $dataArray['line'] = $fileData[0]['line'];
                $dataArray['time'] = $timeStamp->getStamp();
                $dataArray['message'] = $e->getMessage();
                            
                $crashFormat = new CrashLogFormat;
                $crashFormat->setData($dataArray);
                $crashFormat->getOutput();

                $logger = new Logger;
                $logger->pushLog(Config::$path['app'].'logs/database.log', $crashFormat->getOutput());
                return false;
            }
		}

        public function rowCount()
        {
            return $this->numRows;
        }

        public function lastID()
        {
            return self::$dbInstance->lastInsertId();
        }

		public function fetchData()
		{
            if($this->numRows)
                return $this->queryObject->fetch(PDO::FETCH_ASSOC);
            else
                return null;
		}

        public function fetchAllData()
        {
            if($this->numRows)
                return $this->queryObject->fetchAll(PDO::FETCH_ASSOC);
            else
                return null;
        }
    }
?>
