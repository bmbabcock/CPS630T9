<?php
/************************************************
* 	Person - Extends fbentity and stores any 	*
*	information	that is unique for a person.	*
*												*
*	Author: Byron Babcock						*
*	Date: 07/03/2012							*
************************************************/
class Person extends FBEntity{
	private $dateCreated;
	
	/****************************************
	*	Constructs the	Perons object.		*
	*										*
	*	$row:	id - the databse id			*
	*			fbid - the id from fb		*
	*			name - the name from fb 	*
	*			dateCreated - the date the	*
						account registered	*
	****************************************/
	function __construct($row){
		parent::__construct($row);
		$this->dateCreated = $row['dateCreated'];
	}
	//TODO: Add error checking
	function setDateCreated($dateTime){
		$this-> dateCreated = $dateTime;
	}
	function getDateCreated(){
		return $this->dateCreated;
	}
	
	function savePerson(){
		if( $this->id > 0 ){
			//Update
			$sqlString = "UPDATE persons SET p p.fbid = '" . $fbid . "', p.name = '" . $this->name . "' WHERE p.id = " . $id;
			//Execute sql
			mysql_query($sqlString);
			mysql_query("COMMIT"); 
			mysql_close() ;
			
		}else{
			//Insert
			$sqlString = "INSERT INTO persons(fbid, name) VALUES()";
			//Execute sql
			mysql_query($sqlString);
			mysql_query("COMMIT"); 
			$this->id = mysql_insert_id();
			mysql_close() ;
		}
	}
	
	function getById($id){
		$sqlString = "SELECT p.id, p.fbid, p.name, p.dateCreated FROM persons p WHERE p.id = " . $id;
		//Execute sql
		mysql_query($sqlString);
		//Set local vars
		while($row = mysql_fetch_array($result))
		  {
			  $this->id = $row['id'];
			  $this->fbId = $row['fbid'];
			  $this->name = $row['name'];
			  $this->dateCreated = $row['dateCreated'];
		  }
		  mysql_close() ;
		
	}
	
	function getByFbId($fbid){
		$sqlString = "SELECT p.id, p.fbid, p.name, p.dateCreated FROM persons p WHERE p.fbid = '" . $fbid . "'";
		//Execute sql
		$result = mysql_query($sqlString); 
		//Set local vars
		while($row = mysql_fetch_array($result))
		  {
			  $this->id = $row['id'];
			  $this->fbId = $row['fbid'];
			  $this->name = $row['name'];
			  $this->dateCreated = $row['dateCreated'];
		  }
		mysql_close() ;
	}
	
	function delete(){
		if( $this->id > 0 ){
			$sqlString = "DELETE FROM persons p WHERE p.id = " . $this->id;
			//Execute sql
			mysql_query($sqlString);
			mysql_query("COMMIT"); 
			mysql_close() ;
		}
		
	}
	
}
?>