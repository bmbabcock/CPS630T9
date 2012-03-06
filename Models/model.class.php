<?php>
class Model {
	private $id;
	function __construct( $row ) {
		if (is_array($row)){
			$id = $row['id'];
		}
	}
}