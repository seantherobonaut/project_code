<?php
	//Maybe have an interface maybe of MessageSenderInterface that has the method send($msg) for texts, emails, etc...
	class Emailer
	{
		public $to = null;
		public $from = null;
		public $subject = null;

		private function isValid($input)
		{
			if(!empty($input) && is_string($input))
				return true;
			else
				return false;
		}

		public function send($msg)
		{
			if($this->isValid($this->to) && $this->isValid($this->from) && $this->isValid($this->subject) && $this->isValid($msg))
			{
				$headers = "From: $this->from\r\n";
				$headers .= "Reply-To: $this->from\r\n";
				$headers .= "Return-Path: $this->from\r\n";	
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$headers .= "X-Priority: 3\r\n";
				$headers .= "X-Mailer: PHP". phpversion() ."\r\n";

				mail($this->to, $this->subject, $msg."\r\n", $headers);							

				return true;
			}
			else
			{
				trigger_error('Entries for the emailer are not valid. Check the data and try again.', E_USER_WARNING);
				return false;
			}

		}
	}
?>
