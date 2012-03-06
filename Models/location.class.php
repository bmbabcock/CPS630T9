<?php>
class Location extends Model {
	private $lid;
	private $fblid;
	private $name;
	__construct($row){
		parent::construc($row);
		if(is_array($row)){
			$lid = $row['lid'];
			$fblid = $row['fblid'];
			$name = $row['name'];
		}
		
	}
}