<?php
/************************************************
* 	FBEntity - Extends entity and stores any 	*
*	information	that is common for all entities	*
*	loaded from fb								*
*												*
*	Author: Byron Babcock						*
*	Date: 06/03/2012							*
************************************************/
	class FBEntity extends Entity {
	private $fbid;
	private $name;
	/************************************
	*	Constructs the	FBEntity object.*
	*									*
	*	$row:	id - the databse id		*
	*			fbid - the id from fb	*
	*			name - the name from fb *
	************************************/
	function __construct($row){
		parent::__construct($row);
		if(is_array($row)){
			$this->fbid = $row['fbid'];
			$this->name = $row['name'];
		}
	}
	function getFbid(){
		return $this->fbid;
	}
	function setFbid($value){
		$this->fbid = $value;
	}
	function getName(){
		return $this->name;
	}
	function setName($value){
		$this->name = $value;
	}
}
?>