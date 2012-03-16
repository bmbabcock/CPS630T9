<?php>


abstract class UserAuthorizationController{

	function __construct($row){
		parent::__construct($row);
		$this->view = 'userauthorizationview.inc.php'
	}
		

	function loadData(){
		//TODO:Load anything needed here
	}
}
<?>