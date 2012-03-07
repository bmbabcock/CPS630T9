<?php>
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
