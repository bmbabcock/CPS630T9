<HTML>
<BODY>

<?php

require_once '/Tests/model.testcase.php';
require_once '/Models/model.class.php';
require_once 'PHPUnit.php';

$suite = new PHPUnit_TestSuite("ModelTest");
$result = PHPUnit::run($suite);

echo $result -> toHTML();

?>

</BODY>
</HTML>