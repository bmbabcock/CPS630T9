<?php

abstract class Controller{
	protected $view;
	protected $arguments;
	protected $data;

	function __construct($row){
		$arguments = $row;
	}
		

	abstract function loadData();
	function render(){
		$settings = new Settings();
		if(isset($this->data)) expand($this->data);
		include($settings::$ROOT_DIR . 'Views'. '/' . $this->view);
	}
}
?>
