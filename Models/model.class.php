
<?php
/************************************************
* 	FBModel - Extends model and stores any 		*
*	information	that is common for all models	*
*	loaded from fb								*
*												*
*	Author: Byron Babcock						*
*	Date: 06/03/2012							*
************************************************/
class Model {
	private $id;
	function __construct( $row ) {
		if (is_array($row)){
			$this->id = $row['id'];
		}
	}
	function getId() {
		return $this->id;
	}
	//TODO: consider removing this as the id should not change
	function setId( $value ) {
		$this->id = $value;
	}
}
?>