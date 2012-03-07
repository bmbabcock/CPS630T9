<?php
	class FBModel extends Model {
	private $fbid;
	private $name;
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