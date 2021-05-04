<?php
	/*
		Year = Y
		Day = d
		Month = n
		Hour = G
		Minute = i
		Second = s
	*/
	class TimeStamp
	{
		private $millisecond = 0;
		private $datetime;

		public function __construct()
		{
			$this->updateMS();
			$this->datetime = new DateTime;
		}

		private function updateMS()
		{
			$this->millisecond = round(microtime()*1000);
		}

		public function updateTime()
		{
			$this->updateMS();
			$this->datetime->setTimeStamp(time());
		}

		public function format($format)
		{
			//TODO If format contains the substring '!', then later replace ! with millisecond
			return $this->datetime->format($format);
		}		

		//Return a new formatted timestamp string
		public function getStamp()
		{
			$date = $this->datetime->format('n').'-'.$this->datetime->format('d').'-'.$this->datetime->format('Y');
			$time = $this->datetime->format('G').':'.$this->datetime->format('i').':'.$this->datetime->format('s').':'.sprintf('%03d', $this->millisecond);
			return '['.$date.']'.'['.$time.']';
		}

		//Return the difference between timestamps in seconds (requires a specific format Ex: [5-14-2018][14:13:08:71])
		public static function compareStamps($stamp1, $stamp2)
		{
			$val1 = self::getStampEpoch($stamp1);
			$val2 = self::getStampEpoch($stamp2);

			return round(($val2 - $val1),4);
		}

		//Accepts a valid stamp as a string, and returns the time since EPOCH + MS
		public static function getStampEpoch($stamp)
		{
			$stampArray = explode("][", $stamp);
			$stampArray[0] = str_replace('[', '', $stampArray[0]);
			$stampArray[1] = str_replace(']', '', $stampArray[1]);

			$date = explode('-', $stampArray[0]);
			$time = explode(':', $stampArray[1]);

			return mktime($time[0], $time[1], $time[2], $date[0], $date[1], $date[2]).'.'.$time[3];	
		}

		//TODO create a method that takes in seconds and returns an array assoc of years, days, hours, minutes, seconds and microseconds
		public static function getClockTime($seconds)
		{
			//is this a number in seconds?
			
		}
	}
?>
