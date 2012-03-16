<html>
	<head>
	
	</head>
	<body>
		<?php
			include 'settings.class.php';
			include 'autoinclude.inc.php';
			$uac = new UserAuthorizationController();
			$uac->loadData();
			$uac->render();
		?>
	</body>
</html>