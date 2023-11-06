<?php require_once("../../CommonFunctions.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <?php stylesheet(); ?>
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