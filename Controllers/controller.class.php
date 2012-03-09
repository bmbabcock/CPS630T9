<?php>

abstract class Controller(){
	private $view;
	private $arguments;

	function __construct($row){
		$arguments = $row;
	}
		

	abstract function getData();
	function render(){
		
	}
}
<?>
