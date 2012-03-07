<?php 
require_once 'PHPUnit.php';
class PersonTest extends PHPUnit_TestCase
{
	private $m;
	
	function ModelTest($name){
		$this->PHPUnit_TestCase($name);
	}
	private $dateCreated;
	function setUp() {
		$this->dateCreated = getdate();
		$row = array('id' => 123,
			'fbid' => 'facebook123',
			'name' => 'A Name',
			'dateCreated' => $this->dateCreated);
		$this->m = new Person($row);
	}
	function tearDown() {
		unset($this->m);
	}
	function testGetDateCreated() {
		$result = $this->m->getDateCreated();
		$this->assertEquals($result, $this->dateCreated);
	}
	function testSetDateCreated() {
		$expected = getdate();
		$this->m->setDateCreated($expected);
		$result = $this->m->getDateCreated();
		$this->assertEquals($result, $expected);
	}
}
?>