<?php>

abstract class Controller{
	protected $view;
	protected $arguments;
	protected $data;

	function __construct($row){
		$arguments = $row;
	}
		

	abstract function loadData();
	function render(){
		if(isset($this->data)) expand($this->data);
		include(Settings::ROOT_DIR . 'Views\\' . $view);
	}
}
<?>
