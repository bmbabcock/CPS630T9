<HTML>
<BODY>

<?php
require_once '/Tests/modeltest.class.php';
require_once '/Tests/fbmodeltest.class.php';
require_once '/Models/model.class.php';
require_once '/Models/fbmodel.class.php';
require_once 'PHPUnit.php';

$suite1 = new PHPUnit_TestSuite("ModelTest");
$result = PHPUnit::run($suite1);
echo $result -> toHTML();

$suite2 = new PHPUnit_TestSuite("FBModelTest");
$result = PHPUnit::run($suite2);
echo $result -> toHTML();

?>

</BODY>
</HTML>