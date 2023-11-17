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
		renderIngredientInfo(json_decode(file_get_contents("CrabMeat.json"), true));
		renderIngredientInfo(json_decode(file_get_contents("OctopusMeat.json"), true));
	?>
</body>
</html>