<?php


class UserAuthorizationController extends Controller{

	function __construct($row = null){
		parent::__construct($row);
		$this->view = 'userauthorizationview.inc.php';
	}
		

	function loadData(){
		//TODO:Load anything needed here
	}
}
?>