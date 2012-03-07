<?php

require_once 'modeltest.test.php';
require_once 'PHPUnit.php';

$suite = new PHPUnit_TestSuite("ModelTest");
$result = PHPUnit::run($suite);

echo $result -> toHTML();

?>