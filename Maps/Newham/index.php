<?php require_once("../../CommonFunctions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<?php generateHeader(); ?>
    <div style="width: 100vw;height: 100vh;overflow: hidden;">
	    <img style="width: 35%;height: 100%;" src="wipotter.png"/>
    </div>
    <h2>Locations</h2>
    <?php displayDirectory(); ?>
</body>
</html>