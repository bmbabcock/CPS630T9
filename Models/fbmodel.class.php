<?php
/************************************************
* 	FBModel - Extends model and stores any 		*
*	information	that is common for all models	*
*	loaded from fb								*
*												*
*	Author: Byron Babcock						*
*	Date: 06/03/2012							*
************************************************/
	class FBModel extends Model {
	private $fbid;
	private $name;
	/************************************
	*	Constructs the	FBModel object.	*
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