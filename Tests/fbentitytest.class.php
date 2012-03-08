<?php
require_once 'PHPUnit.php';
class FBEntityTest extends PHPUnit_TestCase
{
	private $m;
	
	function FBEntityTest($name){
		$this->PHPUnit_TestCase($name);
	}	
	function setUp() {
		$row = array('id' => 123,
			'fbid' => 'facebook123',
			'name' => 'A Name');
		$this->m = new FBEntity($row);
	}
	function tearDown() {
		unset($this->m);
	}
	function testGetFbid() {
		$result = $this->m->getFbid();
		$expected = 'facebook123';
		$this->assertTrue($result == $expected);
	}
	function testSetFbid() {
		$this->m->setFbid('bookface456');
		$result = $this->m->getFbid();
		$expected = 'bookface456';
		$this->assertTrue($result == $expected);
	}
	function testGetName() {
		$result = $this->m->getName();
		$expected = 'A Name';
		$this->assertTrue(strcmp($result, $expected) == 0);
	}
	function testSetName() {
		$expected = 'Another Name';
		$this->m->setName('Another Name');
		$result = $this->m->getName();
		$this->assertTrue(strcmp($result, $expected) == 0);
	}
}
?>