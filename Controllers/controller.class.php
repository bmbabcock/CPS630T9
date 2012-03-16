<?php>

abstract class Controller(){
	private $view;
	private $arguments;
	private $data;

	function __construct($row){
		$arguments = $row;
	}
		

	abstract function loadData();
	function render(){
		expand($this->data);
		include(Settings::ROOT_DIR . 'Views\\' . $view);
	}
}
<?>
