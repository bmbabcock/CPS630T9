<?php>
class Person extends Model{ 
	private fbid;
	private name;
	function __construct($row){
		parent::__construct($row);
		if (is_array($row)){
			$fbid = $row['fbid'];
			$name = $row['name'];
		}
	}
}