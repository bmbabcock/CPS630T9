<?php
/************************************************
* 	Lcoation - Extends fbmodel and stores any 	*
*	information	that is unique for a location.	*
*												*
*	Author: Byron Babcock						*
*	Date: 06/03/2012							*
************************************************/
class Location extends FBModel {
	/************************************
	*	Constructs the location object.	*
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