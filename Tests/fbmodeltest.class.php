<?php
require_once 'PHPUnit.php';
class FBModelTest extends PHPUnit_TestCase
{
	private $m;
	
	function FBModelTest($name){
		$this->PHPUnit_TestCase($name);
	}	
	function setUp() {
		$row = array('id' => 123,
			'fbid' => 'facebook123',
			'name' => 'A Name');
		$this->m = new FBModel($row);
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
		$result = $this->m->getFbid();
		$expected = 'A Name';
		$this->assertTrue($result == $expected);
	}
	function testSetName() {
		$expected = 'Not a name';
		$this->m->setName($expected);
		$result = $this->m->getName();
		$this->assertEquals($result, $expected);
	}
}
?>