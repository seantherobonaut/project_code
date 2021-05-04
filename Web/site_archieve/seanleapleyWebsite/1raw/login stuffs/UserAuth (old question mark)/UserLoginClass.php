<?php
	//password_hash('password', PASSWORD_BCRYPT, array('cost' => 10));
	//TODO if multiple users are found (make result say fetchAll instead of just fetch)...then throw exception
	class UserLogin
	{
		private $user_data = null;
		private $message = null;
		public function __construct($userLoginArray, $userDataArray)
		{
			$this->login($userLoginArray, $userDataArray);
		}

		private function login($userLoginArray, $userDataArray)
		{
			if(!empty($userLoginArray))
			{
				if(!empty($userDataArray))
				{
					if(password_verify($userLoginArray["password"], $userDataArray["password"]))
					{
						if($userDataArray["active"] == "yes")
						{
							$this->setUserData($userDataArray);
							$this->message = "Success!";
						}
						else
							$this->message = "User is not active.";
					}
					else
						$this->message = "Password incorrect.";
				}
				else
					$this->message = "User does not exist.";
			}
			else
				$this->message = "You must fill all data fields";
		}

		private function setUserData($dataArray)
		{
			$this->user_data = array
			(
				"user_id" => $dataArray["user_id"],
				"username" => $dataArray["username"],
				"rank" => $dataArray["rank"]
			);
		}

		public function getUserData()
		{
			return $this->user_data;
		}

		public function getMessage()
		{
			return $this->message;
		}
	}
?>
