<?php

include ("settings.class.php");

//Handle their connection to the db
class Connection{
		
	private $connection;
	private $id;
	private $fname;
	private $lname;
	
	
	//Constructor
	public function __construct($fbId,$fname,$lname){
		$this->connection = false;
		$this->id = $fbId;
		$this->fname = $fname;
		$this->lname = $lname;
		$this->connection = $this->getConnection();		
	}
	
	
	
	/**************************************
	 *          Public Methods            *
	 **************************************/
	
	//Close this connection
	//public function close(){
	//	if($this->connection != false) mysqli_close($this->connection);
	//	$this->connection = false;
	//}

	//Get the db connection, or else create a db connection for this
	public function getConnection(){
		if(isset($this->connection) && $this->connection != false){
			return $this->connection;
		}
		else{
			$this->createConnection();
			return $this->connection;
		}
	}
	
	
	
	
	/**************************************
	 *         Private Methods            *
	 **************************************/
	
	//Private method to create connection, only called by getConnection()
	private function createConnection(){
		$this->connection = mysqli_connect(Settings::$DB_SERVER, Settings::$DB_USER, Settings::$DB_PASSWORD, Settings::$DB_NAME) or die ("Can't connect to MySQL.");
		
		//If the fbId is not in the db, then we must create a new entry
		//Query the database for the user
		$queryString=sprintf("SELECT * FROM persons WHERE fbid='%s';",$this->id);
		
		//Queries the database with our query string
		$result=mysqli_query($this->connection, $queryString);
		
		//Checks if the database has no entry for a particular fbId 
		if($this->idIsUnique($result)){		
			
			//Create a new entry for the user.		
			$queryAddUser=sprintf("INSERT INTO persons VALUES(null, '%s','%s','%s', null)",$this->id,$this->fname, $this->lname);
			
			$result=mysqli_query($this->connection,$queryAddUser);		
		}
		else{
		}
	}

	//Returns true if the db does not contain the fb id
	private function idIsUnique($result){
		if((!$result)||(mysqli_num_rows($result)==0))
			return true;
		else	
			return false;	
	}
}
?>