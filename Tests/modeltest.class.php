<?php 
require_once 'PHPUnit.php';
class ModelTest extends PHPUnit_TestCase
{
	private $m;
	
	function ModelTest($name){
		$this->PHPUnit_TestCase($name);
	}
	
	function setUp() {
		$row = array('id' => 123);
		$this->m = new Model($row);
	}
	function tearDown() {
		unset($this->m);
	}
	function testGetId() {
		$result = $this->m->getID();
		$expected = 123;
		$this->assertTrue($result == $expected);
	}
	function testSetId() {
		$this->m->setId(456);
		$result = $this->m->getId();
		$expected = 456;
		$this->assertTrue($result == $expected);
	}
}
?>	