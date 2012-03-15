<?php
class Connection{
		
	private $connection;
	
	public function __construct(){
		$this->connection = false;
		$this->connection = $this->getConnection();
	}
	public function getConnection(){
		if(isset($this->connection) && $this->connection != false){
			return $this->connection;
		}
		else return $this->connect();
	}
	public function connect(){
		$this->connection = mysql_connect(Settings::DB_SERVER, $Settings::DB_USER, $Settings::DB_PASSWORD)
			or die('Could not connect to mysql server');
		if(!$this->connection) return $this->connection;
		else return selectDatabase();
	}
	public function selectDatabase(){
		mysql_select_db(Settings::DB_NAME, $this->connection) 
			or die('Could not select database');
		return $this->connection;
	}
	public function cleanUp(){
		if($this->connection != false) mysql_close($this->connection);
		$this->connection = false;
	}
}
?>
