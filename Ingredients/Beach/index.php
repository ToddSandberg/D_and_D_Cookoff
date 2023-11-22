<?php require_once("../../CommonFunctions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<?php stylesheet(); ?>
</head>
<body>
	<?php
		generateHeader();
		displayDirectory();
	?>
	<h5>Level 0</h5>
	<?php
		echo genericJsonRender(json_decode(file_get_contents("Level_0/CrabMeat.json"), true));
		echo genericJsonRender(json_decode(file_get_contents("Level_0/OctopusMeat.json"), true));
	?>
</body>
</html>