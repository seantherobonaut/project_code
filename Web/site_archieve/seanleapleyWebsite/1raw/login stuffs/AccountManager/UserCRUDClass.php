<?php
	/*
		interface idea for all CRUD ops. since all changes are different, those changes will be a different class not consistent through an interface...but basic ops can
		
		getID($field, $value)
		getRecord($id) return a new object or null
		deleteRecord($id)
		createRecord(array)
		
		//This will go the specific class for that record
		recordExists($id) return true/false
		
	*/

	$users = new UserData(Config::$dbConn['user']);
	
	$john = new User(1);
	//Constructor
	/*
		User, UserData

		User class has a public static method to set the DB connection that creates private static members that hold shared PDO statments
		Constructor checks if they exist, if they do not... ah that changes things(because you are not requiring constructor to have DBconn...that means someone can instantiate the User class without a dbconnection)
			...maybe have an optional parameter in the constructor to accept database method? ...eh they can still skip it

		UserData class will have a method getUser and create User, User class just has read, set, delete

	*/


//No more extending, there will be create, read, update, delete classes
//the updates will have another sql statement to search for the updated entry for success
/*
	ex:
		id:1, name:joe

		update name=fred WHERE id:1

		then, search for all names=FREd, if you get a result back, change was successful, if not, record was not updated... check logs

		test to see if delete statment fails, the read statment on just a working record still proceeds
		update false record for fred, but still see if statemnt to read joe still works after failed delete statment


		use hardcoded method names

		use just 2 queries, an update query qith filling, and a get query with the entire array and just return['field']
*/
	//getID, recordExists


	
		//This will not have a delete method, we will pass the objects getID() to the UserData method deleteRecord()
	class User
	{
		//PDO statements for read and write
		private static $readUser = null;
		private static $updateUser = null;

		//Stores a reference to dbConn
		private static $conn = null;
		public static function setConnection(DBconn &$instance)
		{
			self::$conn = &$instance;
		}

		private $id = -1;

		//If the database connection is not set, allow this to crash, the UserData class will check if a DB conn is present before returning this object	
		public function __construct($id)
		{
			$this->id = $id;

			self::$readUser = self::$conn->getInstance("SELECT * FROM `users` WHERE `id`=?;");
			self::$updateUser = self::$conn->getInstance("UPDATE `users` SET `email`=?, `username`=?, `password`=?, `2FA`=? WHERE `user_id`= ?;");			
		}

		public function getID()
		{
			return $this->id;
		}

		//TODO method of getData() that returns assoc array?

		//Update the user's email address (NOW test this before copying everything)
		public function setEmail($email)
		{
			self::$readUser->runQuery(array($this->id));			
			if(self::$readUser->rowCount())
			{
				$user = self::$readUser->fetchData();

				//$email = $user['email'];
				$username = $user['username'];
				$password = $user['password'];
				$twoFactorAuth = $user['2FA'];

				self::$updateUser->runQuery(array($email, $username, $password, $twoFactorAuth, $this->id));
				//TODO return affected rows or search for the updated entry.

				return 1;
			}
			else
				return -1;
		}

		//Update the user's username
		public function setName($name)
		{

		}

		//Update the user's password 
		public function setPassword($password)
		{

		}

		//Update the user's phone number for 2FA (if phone number is blank, this ability is not used)
		public function set2FA($phoneNumber)
		{

		}	

	}

	class UserData
	{
		public function __construct(DBconn &$instance)
		{

		}

		public function getID($field, $value)
		{

		}

		//return a new object or null
		public function getRecord($id)
		{

		}

		public function deleteRecord($id)
		{

		}

		public function createRecord(Array $data)
		{

		}	
	}







	class UserCRUD
	{
		private $idFromName = null;
		private $idFromEmail = null;
		
		private $createUser = null;

		private $entryFromID = null;

		private $updateEmail = null;
		private $updateName = null;
		private $updatePassword = null;
		private $update2FA = null;

		private $deleteID = null;

		public function __construct(DBconn &$instance)
		{
			$this->idFromName = $instance->getInstance("SELECT `user_id` FROM `users` WHERE `username`=?;");
			$this->idFromEmail = $instance->getInstance("SELECT `user_id` FROM `users` WHERE `email`=?;");

			//Create
			$this->createUser = $instance->getInstance("INSERT INTO `users` (`email`, `username`, `password`, `2FA`) VALUES (?,?,?,?);");

			//Read 
			$this->entryFromID = $instance->getInstance("SELECT * FROM `users` WHERE `user_id`=?;");

			//Update
			$this->updateEmail = $instance->getInstance("UPDATE `users` SET `email`=? WHERE `user_id`= ?;");
			$this->updateName = $instance->getInstance("UPDATE `users` SET `username`=? WHERE `user_id`= ?;");
			$this->updatePassword = $instance->getInstance("UPDATE `users` SET `password`=? WHERE `user_id`= ?;");
			$this->update2FA = $instance->getInstance("UPDATE `users` SET `2FA`=? WHERE `user_id`= ?;");
			
			//Delete
			$this->deleteID = $instance->getInstance("DELETE FROM `users` WHERE `user_id`=?;");
		}

		public function getIDByName($name)
		{
			$this->idFromName->runQuery(array($name));
			if($this->idFromName->rowCount())
				return $this->idFromName->fetchData()['user_id'];
			else
				return null;
		}

		public function getIDByEmail($email)
		{
			$this->idFromEmail->runQuery(array($email));
			if($this->idFromEmail->rowCount())
				return $this->idFromEmail->fetchData()['user_id'];
			else
				return null;
		}

		public function recordExists($id)
		{
			$this->entryFromID->runQuery(array($id));
			if($this->entryFromID->rowCount())
				return true;
			else
				return false;			
		}

//TODO Later, make sure all these return -1 if no record, 1 for success or -2 for failure (update, delete, and create... methods will search for updated entry)
//after changes, try to get the entire record, and see if that field has the updated value rather make more search queries.
/*
	After you update an entry, grab the entry with all values form the database, check to make sure the entry just grabbed matches the change.
	...or you can do a query like "...WHERE column IS NOT NULL" to have 1 query to search for one term I guess...

	If you try to delete a record that does not exist and SQL hates that, can you execute other statments after, or does all execution stop?
*/

		//Take in array of data, check if valid, submit change to database, search for the entry after creation to confirm it exists.
		//return a result array where index 0 == string 'success', or several items of why it failed
		public function createUser(Array $data)	
		{
			//Result array to be returned
			$result = array();

			//IDEA security verification questions
			
			//Fill in all data fields
			$email = null;
			if(!empty($data['email']))
				$email = $data['email'];
			$username = null;
			if(!empty($data['username']))
				$username = $data['username'];
			$password = null;
			if(!empty($data['password']))
				$password = $data['password'];
			$twoFactorAuth = null;
			if(!empty($data['twoFactorAuth']))
				$twoFactorAuth = $data['twoFactorAuth'];

			//Do validation login on all entries above

			//If no errors, create the record
			if(count($result) < 1)
			{
				//Actually create the record
				$this->createUser->runQuery(array($email, $username, $password, $twoFactorAuth));
				
				//Check if the new user exists and matches all records created
				$record = $this->getRecord($this->getIDByEmail($email));
				if(!empty($record))
				{
					if($email == $record['email'] && $username == $record['username'] && $password == $record['password'] && $twoFactorAuth == $record['2FA'])
						array_push($result, 'success');
					else						
						array_push($result, 'Unknown error. Data provided does not match data created.');										
				}	
				else
					array_push($result, 'Unable to locate created record. Check for errors.');		
			}

			return $result;
		}

		//Returns entire record of ID
		public function getRecord($id)
		{
			$this->entryFromID->runQuery(array($id));
			if($this->entryFromID->rowCount())
				return $this->entryFromID->fetchData();
			else
				return null;			
		}

		//Update the user's email address
		public function updateEmail($id, $email)
		{
			if($this->recordExists($id))
			{
				$this->updateEmail->runQuery(array($email, $id));
				return 1;
			}
			else
				return -1;
		}

		//Update the user's username
		public function updateName($id, $name)
		{
			if($this->recordExists($id))
			{
				$this->updateName->runQuery(array($name, $id));
				return 1;
			}
			else
				return -1;
		}

		//Update the user's password 
		public function updatePassword($id, $password)
		{
			if($this->recordExists($id))
			{
				//It is up to the ajax programmer to encrypt the password before passing it to this function
				$this->updatePassword->runQuery(array($password, $id));
				return 1;
			}
			else
				return -1;
		}

		//Update the user's phone number for 2FA (if phone number is blank, this ability is not used)
		public function update2FA($id, $phoneNumber)
		{
			if($this->recordExists($id))
			{
				$this->update2FA->runQuery(array($phoneNumber, $id));
				return 1;
			}
			else
				return -1;
		}	

		public function deleteID($id)
		{
			if($this->recordExists($id))
			{
				$this->deleteID->runQuery(array($id));
				return 1;
			}
			else
				return -1;
		}		

	}
?>
