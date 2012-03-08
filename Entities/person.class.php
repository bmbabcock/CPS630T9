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
}
?>