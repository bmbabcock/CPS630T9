<?php
/************************************************
* 	Person - Extends fbmodel and stores any 	*
*	information	that is unique for a person.	*
*												*
*	Author: Byron Babcock						*
*	Date: 06/03/2012							*
************************************************/
class Person extends Model{
	/************************************
	*	Constructs the	Perons object.	*
	*									*
	*	$row:	id - the databse id		*
	*			fbid - the id from fb	*
	*			name - the name from fb *
	************************************/
	function __construct($row){
		parent::__construct($row);
	}
}
?>