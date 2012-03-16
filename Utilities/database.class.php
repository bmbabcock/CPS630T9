<?php>
/************************************************
* 	Database- Makes queries safe and then sends	*
*			them.  								*
*												*
*	Author: Byron Babcock						*
*	Date: 15/03/2012							*
************************************************/
class Database{
	private $connection;
	public function __construct(){
		$this->connection = new Connection();
	}
	public function exec($queryString){
		$query = cleanQuery($queryString);
		$response = false;
		if($this->connection->getConnection() != false){
			$result = mysql_query($query);
		}
		else{
			$message = 'Could not open connection to database.');
			die($message);
		}
		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
		$return new Response($result);
	}
	public function cleanQuery($dirtyQuery){
		return mysql_real_escape_string($dirtyQuery);
	}
<?>