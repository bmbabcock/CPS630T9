<html>
<body>

<?php
/*require_once '/Tests/entitytest.class.php';
require_once '/Tests/fbentitytest.class.php';
require_once '/Tests/persontest.class.php';
require_once '/Entities/entity.class.php';
require_once '/Entities/fbentity.class.php';
require_once '/Entities/person.class.php';*/
require_once 'PHPUnit.php';
require_once 'autoinclude.inc.php';

$suite1 = new PHPUnit_TestSuite("EntityTest");
$result = PHPUnit::run($suite1);
echo $result -> toHTML();

$suite2 = new PHPUnit_TestSuite("FBEntityTest");
$result = PHPUnit::run($suite2);
echo $result -> toHTML();

$suite3 = new PHPUnit_TestSuite("PersonTest");
$result = PHPUnit::run($suite3);
echo $result -> toHTML()

?>

</body>
</html>